<?php

namespace BlandIndustries\TimingApi;

/**
 *  The Timing Api Task Class
 *
 *  @author Thomas Verstraete <thomas@bland.com>
 */
class Task extends TimingApi
{
    /**
     * End point of api.
     *
     * @var string
     */
    protected $endPoint = 'time-entries';

    /**
     * Restrict the results to tasks after the given datetime.
     * Format: 2019-01-01T00:00:00.000000+00:00
     *
     * @return self
     */
    public function startDate(string $startDate)
    {
        $this->queryParameters['start_date_min'] = $startDate;

        return $this;
    }

    /**
     * Restrict the results to tasks before the given datetime.
     * Format: 2019-01-01T00:00:00.000000+00:00
     *
     * @param  string  $startDate
     * @return self
     */
    public function endDate(string $endDate)
    {
        // 2019-01-01T00:00:00.000000+00:00
        $this->queryParameters['start_date_max'] = $endDate;

        return $this;
    }

    /**
     * Search the title or notes of the task with the given string.
     *
     * @return self
     */
    public function titleOrNotesSearch(string $searchQuery)
    {
        $this->queryParameters['search_query'] = $searchQuery;

        return $this;
    }

    /**
     * Restrict the results to running or not running tasks.
     *
     * @return self
     */
    public function running(bool $isRunning)
    {
        if ($isRunning) {
            $this->queryParameters['is_running'] = 'true';
        } else {
            $this->queryParameters['is_running'] = 'false';
        }

        return $this;
    }

    /**
     * Restrict the results to running tasks.
     *
     * @return self
     */
    public function isRunning()
    {
        $this->queryParameters['is_running'] = 'true';

        return $this;
    }

    /**
     * Restrict the results to not running tasks.
     *
     * @return self
     */
    public function isNotRunning()
    {
        $this->queryParameters['is_running'] = 'false';

        return $this;
    }

    /**
     * Restrict the results to tasks for the given projects. And indicate if you
     *  want to also include tasks from child projects of the given projects.
     *
     * @return self
     */
    public function withProjects(array $projectIds, bool $withChildeProjects = false)
    {

        $projects = [];
        foreach ($projectIds as $id) {
            $projects[] = '/projects/'.$id;
        }
        $this->queryParameters['projects[]'] = $projects;

        if ($withChildeProjects) {
            $this->queryParameters['include_child_projects'] = 'true';
        } else {
            $this->queryParameters['include_child_projects'] = 'false';
        }

        return $this;
    }

    /**
     * Include tasks from child projects of the given projects.
     *
     * @return self
     */
    public function includeChildeProjects()
    {
        $this->queryParameters['include_child_projects'] = 'true';

        return $this;
    }

    /**
     * Include with results the data about the project the task is associate with.
     *
     * @return self
     */
    public function includeProjectData()
    {
        $this->queryParameters['include_project_data'] = 'true';

        return $this;
    }

    /**
     * Include tasks performed by other team members.
     *
     * @return self
     */
    public function includeTeamMembers()
    {
        $this->queryParameters['include_team_members'] = 'true';

        return $this;
    }

    public static function inHours(float $seconds)
    {
        return $seconds / 60 / 60;
    }
}
