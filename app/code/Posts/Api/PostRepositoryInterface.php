<?php

interface PostRepositoryInterface {

    /*
     * Posts Index view
     * @return views/(index)
     */
    public function index();

    /*
     * Post Add view
     * @return views/add
     */
    public function add();

    /*
     * Post Edit view
     * @return views/edit
     */
    public function edit($id);

    /*
     * Post Show view
     * @return views/show
     */
    public function show($id);

    /*
     * Post Delete view
     * @return views/delete
     */
    public function delete($id);
}