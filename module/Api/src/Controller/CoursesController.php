<?php

namespace Api\Controller;

use Laminas\Mvc\Controller\AbstractRestfulController;
use Laminas\View\Model\JsonModel;
use Application\Service\CoursesService;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="API Documentation", version="0.1")
 */
class CoursesController extends AbstractRestfulController
{
    private CoursesService $coursesService;

    private const DEFAULT_PAGE = 1;
    private const DEFAULT_LIMIT = 10;
    

    public function __construct(  CoursesService $coursesService)
    {
        $this->coursesService = $coursesService;
    }

     /**
     * @OA\Get(
     *   path="/courses/public/api/courses",
     *   summary="Get a list of courses",
     *   tags={"Courses"},
     *   @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     description="the pagination page",
     *     @OA\Schema(
     *       type="integer"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="limit",
     *     in="query",
     *     required=false,
     *     description="the pagination limit",
     *     @OA\Schema(
     *       type="integer"
     *     ),
     *   ),
     *   @OA\Response(response="200", description="A list of courses",
     *     @OA\JsonContent(example={
     *       {
     *        "Id": "1",
     *        "Title": "course 1",
     *        "Description": "Description 1",
     *        "Status": "Pending",
     *        "IsPremium": false,
     *        "CreatedAt": null,
     *        "DeletedAt": "2023-03-15 13:09:47.000000"
     *      },
     *      {
     *        "Id": "2",
     *        "Title": "course 2",
     *        "Description": "Description 2",
     *        "Status": "Pending",
     *        "IsPremium": false,
     *        "CreatedAt": null,
     *        "DeletedAt": "2023-03-15 13:09:47.000000"
     *      }
     *    })
     *   ),
     *   @OA\Response(response="400", description="There is no course",
     *     @OA\JsonContent(example={
     *       {
     *        "status": 400,
     *        "message": "There is no course"
     *       }
     *    })
     *   ),
     * )
     **/
    public function getListAction()
    {
        $page = $this->params()->fromQuery('page', self::DEFAULT_PAGE);
        $limit = $this->params()->fromQuery('limit', self::DEFAULT_LIMIT);
        $response = $this->coursesService->getList($page, $limit);

        if (isset($response['status'])) {
            $this->getResponse()->setStatusCode($response['status']);
        }

        return new JsonModel($response);
    }

    
     /**
     * @OA\Get(
     *   path="/courses/public/api/courses/{id}",
     *   summary="Get single course by id",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="The id passed to get in url path",
     *       @OA\Schema(
     *         type="string"
     *       ),
     *     ),
     *     tags={"Courses"},
     *     @OA\Response(response="200", description="get a course",
     *     @OA\JsonContent(example={
     *       {
     *        "Id": "1",
     *        "Title": "course 1",
     *        "Description": "Description 1",
     *        "Status": "Pending",
     *        "IsPremium": false,
     *        "CreatedAt": null,
     *        "DeletedAt": "2023-03-15 13:09:47.000000"
     *      }
     *    }),
     *   ),
     *     @OA\Response(response="400", description="Course not found",
     *       @OA\JsonContent(example={
     *         {
     *           "status": 400,
     *           "message": "Course not found"
     *         }
     *       })
     *     )
     * )
     **/
    public function getCourseAction()
    {

        $id = (int)$this->params()->fromRoute('id');
        $response = $this->coursesService->getCourse($id);

        if (isset($response['status'])) {
            $this->getResponse()->setStatusCode($response['status']);
        }

        return new JsonModel($response);
    }

     /**
     * @OA\Post(
     *   path="/courses/public/api/courses",
     *   summary="Create a new record",
     *   tags={"Courses"},
     *   @OA\RequestBody(
     *      @OA\MediaType(
     *         mediaType="multipart/form-data",
     *         @OA\Schema(
     *            @OA\Property(
     *               property="title",
     *               type="string",
     *               example="Course title", 
     *               maxLength=50
     *            ),
     *            @OA\Property(
     *               property="description",
     *               type="string",
     *               maxLength= 255
     *            ),
     *            @OA\Property(
     *               property="status",
     *               type="string",
     *               example="Pending",
     *               @OA\Schema(
     *                  type="string",
     *                  enum="{'Pending', 'Published'}"
     *               ),
     *            ),
     *            @OA\Property(
     *               property="is_premium",
     *               type="bool",
     *            ),
     *         ),
     *      ),
     *   ),
     *   @OA\Response(response="200", description="Course created successfully",
     *     @OA\JsonContent(example={
     *       {
     *        "status": 200,
     *        "message": "Course created successfully"
     *       }
     *     }),
     *   ),   
     *   @OA\Response(
     *      response=400,
     *      description="Bad request error:
     *       `First Error` - Invalid title,
     *       `Second Error` - Invalid status,
     *       `Third Error` - Invalid description",
     *      @OA\JsonContent(example={
     *        {
     *          "status": 400,
     *          "message": "Invalid description: description should be less than or equal to 255 characters"
     *        }
     *     })
     *   ),
     * )
     **/
    public function createAction()
    {
        $data = $this->getRequest()->getPost()->toArray();

        $response = $this->coursesService->create($data);

        if ($response['status'] !== 200) {
            $this->getResponse()->setStatusCode($response['status']);
        }

        return new JsonModel($response);
    }

     /**
     * @OA\Put(
     *    path="/courses/public/api/courses/{id}",
     *    summary="Update a course",
     *    tags={"Courses"},
     *    @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       description="The id passed to get in url path",
     *       @OA\Schema(
     *          type="string"
     *       ),
     *    ),
     *    @OA\RequestBody(
     *       @OA\MediaType(
     *          mediaType="json",
     *          @OA\Schema(
     *             @OA\Property(
     *                property="title",
     *                type="string",
     *                maxLength= 50
     *             ),
     *             @OA\Property(
     *                property="description",
     *                type="string",
     *                maxLength= 255
     *             ),
     *             @OA\Property(
     *                property="status",
     *                type="string",
     *                example="Pending",
     *                @OA\Schema(
     *                   type="string",
     *                   enum="{'Pending', 'Published'}"
     *                ),
     *             ),
     *             @OA\Property(
     *                property="is_premium",
     *                type="bool",
     *             ),
     *          ),
     *       ),
     *    ),
     *    @OA\Response(response="200", description="Course updated",
     *      @OA\JsonContent(example={
     *       {
     *        "status": 200,
     *        "message": "Course updated successfully"
     *       }
     *      }),
     *    ),   
     *    @OA\Response(
     *       response=400,
     *       description="Bad request error:
     *        `First Error` - Course not found,
     *        `Second Error` - Invalid title,
     *        `Third Error` - Invalid status,
     *        `Fourth Error` - Invalid description",
     *      @OA\JsonContent(example={
     *        {
     *          "status": 400,
     *          "message": "Invalid description: description should be less than or equal to 255 characters"
     *        }
     *     })
     *   ),
     * )
     **/
    public function updateAction()
    {
        $id = (int)$this->params()->fromRoute('id');

        $data = (array)json_decode($this->getRequest()->getContent(), true);
       
        $response = $this->coursesService->update($id, $data);
        
        if ($response['status'] !== 200) {
            $this->getResponse()->setStatusCode($response['status']);
        }

        return new JsonModel($response);
    }


     /**
     * @OA\Delete(
     *    path="/courses/public/api/courses/{id}",
     *    summary="Delete a course by id",
     *    @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       description="The id passed to get in url path",
     *       @OA\Schema(
     *          type="string"
     *       ),
     *    ),
     *    tags={"Courses"},
     *    @OA\Response(response="200", description="Course deleted",
     *      @OA\JsonContent(example={
     *       {
     *        "status": 200,
     *        "message": "Course deleted successfully"
     *       }
     *      }),
     *    ), 
     *    @OA\Response(
     *       response=400,
     *       description="Bad request error:
     *        `First Error` - Course not found,
     *        `Second Error` - Already deleted",
     *      @OA\JsonContent(example={
     *        {
     *          "status": 400,
     *          "message": "Course not found"
     *        }
     *     })
     *   ),
     * )
     **/
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id');
        $response = $this->coursesService->delete($id);
       
        if ($response['status'] !== 200) {
            $this->getResponse()->setStatusCode($response['status']);
        }

        return new JsonModel($response);
    }
}