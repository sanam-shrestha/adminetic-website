<?php

namespace Adminetic\Website\Contracts;

use Adminetic\Website\Models\Admin\Notice;
use Adminetic\Website\Http\Requests\NoticeRequest;

interface NoticeRepositoryInterface
{
    public function indexNotice();

    public function createNotice();

    public function storeNotice(NoticeRequest $request);

    public function showNotice(Notice $Notice);

    public function editNotice(Notice $Notice);

    public function updateNotice(NoticeRequest $request, Notice $Notice);

    public function destroyNotice(Notice $Notice);
}
