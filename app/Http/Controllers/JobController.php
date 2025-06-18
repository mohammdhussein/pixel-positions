<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Models\Tag;
use App\Policies\JobPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {

        $jobs = Job::with(['employer', 'tags'])
            ->latest()
            ->get()
            ->groupBy('featured');

        return view('jobs.index', [
            'jobs' => $jobs[0],
            'featuredJobs' => $jobs[1],
            'tags' => Tag::all()
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        $attributes = $request->validated();

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }
        return redirect('/');
    }

    public function edit(Job $job)
    {
        $this->authorize('edit', $job);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(StoreJobRequest $request, Job $job)
    {
        $attributes = $request->validated();

        $attributes['featured'] = $request->has('featured');
        $job->update(Arr::except($attributes, 'tags'));

        if (!empty($attributes['tags'])) {
            $job->tags()->delete();
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(trim($tag));
            }
        }
        return redirect('/');

    }
}
