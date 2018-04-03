<?php

namespace CodeGym\SlackOutput;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Queue\Events\JobFailed;
use Exception;

use CodeGym\SlackOutput\Library\Exception as E;

class Service
{

    /**
     * The default channel to send job failed to
     *
     * @var string
     */
    protected $channel_job_failed;

    /**
     * The default channel to send scheduled command to
     *
     * @var string
     */
    protected $channel_scheduled_command;

    /**
     * The channel to send exception to
     *
     * @var string
     */
    protected $channel_exception;

    /**
     * The channel to send stats
     *
     * @var string
     */
    protected $channel_stats;


    /**
     * SlackOutput constructor.
     *
     * @param array $config
     */
    function __construct(array $config)
    {
        $env     = app()->environment();
        $channel = $config["channel"]['local'];
        if (isset( $config["channel"][$env] )) {
            $channel = $config["channel"][$env];
        }

        //config
        $this->channel_job_failed        = $channel["job_failed"];
        $this->channel_scheduled_command = $channel["scheduled_command"];
        $this->channel_exception         = $channel["exception"];
        $this->channel_stats             = $channel["stats"];
    }

    /**
     * Report an exception to slack
     *
     * @param Exception $e
     */
    public function exception(Exception $e)
    {
        E::output($e, $this->channel_exception);
    }

}