<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 22.03.2020
 * Time: 00:53
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebBaseController;
use App\Http\Requests\CourseControllerRequests\StoreOrUpdateCourseRequest;
use App\Models\Education\Course;
use App\Services\FileService;

class CourseController extends WebBaseController
{

    protected $fileService;

    /**
     * CourseController constructor.
     * @param $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function index()
    {
        $courses = Course::paginate(10);
        return view('admin.main.courses.index', compact('courses'));
    }

    public function create()
    {
        $course = new Course();
        return view('admin.main.courses.create', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.main.courses.edit', compact('course'));
    }

    public function store(StoreOrUpdateCourseRequest $request)
    {
        $course = new Course();
        $course->fill($request->all());
        $image_path = $this
            ->fileService
            ->store($request->file('image'), Course::DEFAULT_ASSET_PATH);
        $course->image_path = $image_path;
        $course->save();
        $this->added();
        return redirect()->back();
    }

    public function update($id, StoreOrUpdateCourseRequest $request)
    {
        $course = Course::findOrFail($id);
        $course->fill($request->all());
        if ($request->file('image')) {
            $image_path = $this
                ->fileService
                ->updateWithRemoveOrStore($request->file('image'),
                    Course::DEFAULT_ASSET_PATH,
                    $course->image_path);
            $course->image_path = $image_path;
        }
        $course->save();
        $this->edited();
        return redirect()->back();
    }

    public function delete($id)
    {
        $lesson = Course::findOrFail($id);
        $lesson->delete();
        return redirect()->back();
    }
}