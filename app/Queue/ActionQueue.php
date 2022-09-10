<?php

namespace App\Queue;

use App\Queue\Channel\BasicChannelQueue;

class ActionQueue extends BasicActionQueue
{
    private BasicChannelQueue $channel;

    /**
     * @param string $channel
     */
    public function __construct(string $channel)
    {
        $this->channel = new $channel;
    }

    public function push(array $values): void
    {
        $data=[
            'class'=>$values[0],
            'method'=>$values[1],
            'created_at'=>date("Y-m-d H:i:s"),
        ];
        
        $this->channel[] = $data;
    }

    public function all(): array
    {
        $result = [];

        if (!$this->channel->count()) {
            return [];
        }

        foreach ($this->channel as $item) {
            $result[] = $item;
        }

        return $result;
    }

    public function count()
    {
        return $this->channel->count();
    }
}
