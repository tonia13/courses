<?php
namespace Application\Service;

use Propel\CoursesQuery;
use Propel\Courses;

class CoursesService
{
    private const MAX_TITLE_LENGTH = 50;
    private const MAX_DESCRIPTION_LENGTH = 255;
    private const STATUS_PUBLISHED = 'Published';
    private const STATUS_PENDING = 'Pending';
    private const DEFAULT_DESCRIPTION = '';
    private const DEFAULT_IS_PREMIUM = 0;

    private CoursesQuery $coursesQuery;
    private Courses $courses;

    public function __construct(
        CoursesQuery $coursesQuery,
        Courses $courses
    ) {
        $this->courses = $courses;
        $this->coursesQuery = $coursesQuery;
    }

    /**
     * Gets a list of courses or returns the error message
    */
    public function getList(int $page, int $limit): array {
        $offset = ($page - 1) * $limit;
    
        // Retrieve courses with pagination
        $courses = $this->coursesQuery
            ->orderById('ASC')
            ->limit($limit)
            ->offset($offset)
            ->find();

        if (!$courses) {
            return [
                'status' => 400,
                'message' => 'There is no course'
            ];
        }
        return $courses->toArray();
    }

    /**
     * Gets the data of A course or returns the error message
    */
    public function getCourse(int $id): array {
        $course = $this->coursesQuery->findPK($id);

        if (!$course) {
            return [
                'status' => 400,
                'message' => 'Course not found'
            ];
        }

        return $course->toArray();
    }

    /**
     * Creates a new course or returns the error message.
    */
    public function create(array $data): array {
        $validation = $this->validate($data);
        if (!empty($validation)) {
            return $validation;
        }

        try {
            $this->courses->setTitle($data['title'])
                ->setDescription($data['description'] ?? self::DEFAULT_DESCRIPTION)
                ->setStatus($data['status'] ?? self::STATUS_PENDING)
                ->setIsPremium($data['is_premium'] ?? self::DEFAULT_IS_PREMIUM)
                ->setCreatedAt(new \DateTime())
                ->save();
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => 'Failed to create course: ' . $e->getMessage()
            ];
        }

        return [
            'status' => 200,
            'message' => 'Course created successfully'
        ];
    }

    /**
     * Updates a course or returns the error message. 
    */
    public function update(int $id, array $data): array {
        $course = $this->coursesQuery->findPK($id);

        if (!$course) {
            return [
                'status' => 400,
                'message' => 'Course not found'
            ];
        }

        $validation = $this->validate($data, true);
       
        if (!empty($validation)) {
            return $validation;
        }
        if (isset($data['title'])) {
            $course->setTitle($data['title']);
        }
        
        if (isset($data['description'])) {
            $course->setDescription($data['description']);
        }
        
        if (isset($data['status'])) {
            $course->setStatus($data['status']);
        }
        
        if (isset($data['is_premium'])) {
            $course->setIsPremium($data['is_premium']);
        }
        
        $course->save();

        return [
            'status' => 200,
            'message' => 'Course updated successfully'
        ];
    }

    /**
     * Deletes a course or returns the error message
    */
    public function delete(int $id): array {
        $course = $this->coursesQuery->findPK($id);

        if (!$course) {
            return [
                'status' => 400,
                'message' => 'Course not found'
            ];
        }

        if (!empty($course->getDeletedAt())) {
            return [
                'status' => 400,
                'message' => 'Already deleted'
            ];
        }

        try {
            $course->setDeletedAt(new \DateTime())
            ->save();
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => 'Failed to delete course: ' . $e->getMessage()
            ];
        }

        return [
                'status' => 200,
                'message' => 'Course deleted successfully'
            ];
    }

    /**
     * Validates the data if there is no error returns an empty array.
    */
    private function validate(array $data, bool $ignoreTitle = false): array {
        if ((!$ignoreTitle && empty($data['title'])) 
            || isset($data['title']) && strlen($data['title']) > self::MAX_TITLE_LENGTH
        ) {
            return [
                'status' => 400,
                'message' => 'Invalid title: title should not be empty and should be less than or equal to ' . self::MAX_TITLE_LENGTH . ' characters'
            ];
        }
        
        if (!empty($data['status']) 
            && !in_array($data['status'], [self::STATUS_PUBLISHED, self::STATUS_PENDING])
        ) {
            return [
                'status' => 400,
                'message' => 'Invalid status: status should be either "' . self::STATUS_PUBLISHED . '" or "' . self::STATUS_PENDING . '"'
            ];
        }
    
        if (isset($data['description']) 
            && strlen($data['description']) > self::MAX_DESCRIPTION_LENGTH
        ) {
         return [
             'status' => 400,
             'message' => 'Invalid description: description should be less than or equal to ' . self::MAX_DESCRIPTION_LENGTH . ' characters'
         ];
        }

        return [];
    }

}