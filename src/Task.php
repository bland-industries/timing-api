<?php

namespace BlandIndustries\TimingApi;

use phpDocumentor\Reflection\Types\Boolean;

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
     * @param string $startDate
     * @return Self
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
     * @param string $startDate
     * @return Self
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
     * @param string $searchQuery
     * @return Self
     */
    public function titleOrNotesSearch(string $searchQuery)
    {
        $this->queryParameters['search_query'] = $searchQuery;
        return $this;
    }

    /**
     * Restrict the results to running or not running tasks.
     *
     * @param boolean $isRunning
     * @return Self
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
     * @return Self
     */
    public function isRunning()
    {
        $this->queryParameters['is_running'] = 'true';
        return $this;
    }

    /**
     * Restrict the results to not running tasks.
     *
     * @return Self
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
     * @param array $projectIds
     * @param boolean $withChildeProjects
     * @return Self
     */
    public function withProjects(array $projectIds, bool $withChildeProjects = false)
    {

        $projects = [];
        foreach ($projectIds as $id) {
            $projects[] = "/projects/" . $id;
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
     * @return Self
     */
    public function includeChildeProjects()
    {
        $this->queryParameters['include_child_projects'] = 'true';
        return $this;
    }

    /**
     * Include with results the data about the project the task is associate with.
     *
     * @return Self
     */
    public function includeProjectData()
    {
        $this->queryParameters['include_project_data'] = 'true';
        return $this;
    }

    /**
     * Include tasks performed by other team members.
     *
     * @return Self
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
