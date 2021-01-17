<?php

namespace App\Services;

use App\Models\Image;
//use App\Traits\SystemPreference;

class BaseService {

    //use SystemPreference;
    /**
     * Creating Instance Of Model
     *
     * @return void
     */

    public $model;
    public $page_size;

    public function __construct($model) {
        $this->model = $model;
        $this->page_size = 10;
    }
    /**
     * Get paginate object of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginate()
    {
        return $this->model->orderBy('id','DESC')->paginate($this->page_size);
    }

    /**
     * Get list of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a specific resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array $payload
     * @return \Illuminate\Http\Response
     */
    public function create($payload)
    {
        return $this->model->create($payload);
    }

    /**
     * Store a newly created image to imagable.
     *
     * @param  int $model_id
     * @param  array $payload
     * @return \Illuminate\Http\Response
     */
    public function createImage($model_id, $payload)
    {
        $image = new Image();
        $image->path = $payload['path'];
        $image->name = $payload['name'];

        $model_image = $this->model->whereId($model_id)->first()->images()->save($image);

        return $model_image;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $payload
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $payload)
    {
        return $this->model->find($id)->update($payload);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->model->whereId($id)->delete();
    }
}
