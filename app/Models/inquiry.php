<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{
    use HasFactory;
     protected $fillable = ['user_id','agent_id','name','email','contact','message','response_status','whatsapp_updates'];

    public function getMessagesByAgentId($agent_id)
    {
        $messages = inquiry::where('agent_id','=',$agent_id)->get();
        return $messages ;
    }
}
