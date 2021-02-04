<?php

namespace App\Models;

use App\Models\User;
use App\Models\Status;
use App\Models\Project;
use App\Models\Priority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'project_id',
        'created_by_user_id',
        'assigned_to_user_id', 
        'status_id', 
        'priority_id',
        'closed'
	];

	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function priority()
	{
		return $this->belongsTo(Priority::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
