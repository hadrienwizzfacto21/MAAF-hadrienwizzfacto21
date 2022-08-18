<?php

namespace Keemia\Weezio;

use Keemia\UserAgentClass;

require_once __DIR__ . "/../../../vendor/autoload.php";

class WeezioClass
{
    public $conInfo;
    public $toSend;

    /**
     * __construct
     *
     * @param  mixed $wzoConfig
     * @param  mixed $cookiesDuration
     * @return void
     */
    public function __construct(array $wzoConfig, int $cookiesDuration = 86400)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params($cookiesDuration);
            session_start();
        }

        $this->conInfo = [
            "api_key" => $wzoConfig["api_key"],
            "task_id" => $wzoConfig["task_id"] ?? null,
            "interface_id" => $wzoConfig["interface_id"] ?? null,
            "level_id" => $wzoConfig["level_id"] ?? 1,
            "user_agent" => $this->GetUserAgent(),
            "source_id" => $this->GetSourceID($wzoConfig["source_id"] ?? null), //source_id
            "session_id" => $this->GetSessionID($wzoConfig["session_id"] ?? null, $wzoConfig["session_id_length"] ?? null)
        ];

        $this->toSend = $this->GetForm();

        $_SESSION["wzo"] = [
            "conInfo" => $this->conInfo,
            "toSend" => $this->toSend
        ];
    }

    /**
     * GetSessionID
     *
     * @param  mixed $pSessionID
     * @param  mixed $pLenght
     * @return string
     */
    public function GetSessionID(?string $pSessionID = null, ?string $pLenght = "web"): string
    {
        // If defined
        if (isset($pSessionID)) return $pSessionID; // in config
        if (isset($_GET["session_id"])) return $_GET["session_id"]; // in get data
        if (isset($_SESSION["wzo"]["conInfo"]["session_id"])) return $_SESSION["wzo"]["conInfo"]["session_id"]; // in session

        // Else generate
        if ($pLenght == "borne") return 'B' . bin2hex(random_bytes(15));
        return '-W' . bin2hex(random_bytes(15));
    }

    /**
     * GetSourceID
     *
     * @param  mixed $pSourceId
     * @return string
     */
    public function GetSourceID(?string $pSourceId = null): ?string
    {
        if (isset($pSourceId)) return $pSourceId;
        if (isset($_GET["source_id"])) return htmlentities($_GET["source_id"]);
        if (isset($_SESSION["wzo"]["conInfo"]["source_id"])) return $_SESSION["wzo"]["conInfo"]["source_id"];

        return null;
    }

    /**
     * GetUserAgent
     *
     * @return array
     */
    public function GetUserAgent(): array
    {
        $ua = new UserAgentClass;
        return $ua->ToArray();
    }

    /**
     * GetForm
     *
     * @return array
     */
    public function GetForm(): ?array
    {
        if (!isset($_POST)) return null;

        $formData = [];
        foreach ($_POST as $k => $v) if (isset($v) || !empty($v)) $formData[$k] = $this->SecureInput($v);
        return $formData;
    }

    /**
     * SecureInput
     *
     * @param  mixed $pInput
     * @return string
     */
    public function SecureInput(string $pInput): string
    {
        $secInput = trim($pInput);
        $secInput = stripslashes($secInput);
        $secInput = htmlspecialchars($secInput);
        return $secInput;
    }

    /**
     * Get
     *
     * @param  mixed $input
     * @param  mixed $filter
     * @param  mixed $endPoint
     * @return void
     */
    public function Get(?string $input = null, ?string $filter = null, string $endPoint = "participations")
    {
        $pInput ?? $pInput ?? $this->toSend["Email"] ?? "";
        $filter ?? "";
        $getURL = "https://bk.weezio.net/api/v1/{$endPoint}?automation_task_id={$this->conInfo["task_id"]}&{$filter}={$input}";

        $curl = curl_init($getURL);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-api-key:{$this->conInfo['api_key']}",
            ],
        ]);

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $response;
    }


    public function Post(string $endPoint = "participations/weezioapp"): string
    {
        $postURL = "https://bk.weezio.net/api/v1/{$endPoint}?interface_id={$this->conInfo['interface_id']}&source_id={$this->conInfo['source_id']}&level_id={$this->conInfo['level_id']}&session_id={$this->conInfo['session_id']}&device={$this->conInfo['user_agent']['device']}&operating_system={$this->conInfo['user_agent']['operating_system']}&browser={$this->conInfo['user_agent']['browser']}";

        $curl = curl_init($postURL);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $this->toSend,
            CURLOPT_HTTPHEADER => [
                "x-api-key:{$this->conInfo['api_key']}",
            ],
        ]);

        curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        return $error;
    }


    /**
     * Check if participation IsUnique
     *
     * @param  mixed $target
     * @param  mixed $filter
     * @return bool
     */
    public function IsUnique($target = null, $filter = "q[lead_email_eq]"): bool
    {
        $target = $target ?? $this->toSend["Email"];
        $response = $this->Get($target, $filter);
        return !isset($response['participations']['0']['id']);
    }
}

/* CONFIG EXAMPLE 
$wzo = new WeezioClass([
    "api_key" => "96e3f8b0-c2e5-4db0-be59-61d4bae2656d",
    "interface_id" => 1,
    "task_id" => 1,
    "level_id" => 1(default), //optional
    "source_id" => 1, //optional
    "session_id" => "-1234567&89", //optional
    "session_id_length" => "borne/web(default)" //optional
]); */
