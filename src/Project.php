<?php

namespace BlandIndustries\TimingApi;

/**
 *  The Timing Api Project Class
 *
 *  @author Thomas Verstraete <thomas@bland.com>
 */
class Project extends TimingApi
{
    /**
     * End point of api.
     *
     * @var string
     */
    protected $endPoint = 'projects';

    /**
     * Query Parameters to send in request.
     * Default to not including archived projects.
     *
     * @var array
     */
    protected $queryParameters = [
        'hide_archived' => 'true',
    ];

    /**
     * Search the title for the given string.
     *
     * @return self
     */
    public function titleSearch(string $title)
    {
        $this->queryParameters['title'] = $title;

        return $this;
    }

    /**
     * Include archived projects in results.
     *
     * @return self
     */
    public function includeArchived()
    {
        $this->queryParameters['hide_archived'] = 'false';

        return $this;
    }

    /**
     * Get the Hierarchy endpoint of the products api.
     * Returns the result set of the api request as associative array.
     *
     * @return array
     */
    public function getHierarchy()
    {
        return $this->call(['endPoint' => 'projects/hierarchy']);
    }

    // tasks: gets an instance of a Task with project preset object that then can be filtered
    // getTasks: gets tasks results
}
