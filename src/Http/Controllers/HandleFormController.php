<?php

namespace Zx\Admin\Http\Controllers;

use Zx\Admin\Exception\AdminException;
use Zx\Admin\Form\Field\File;
use Zx\Admin\Http\JsonResponse;
use Zx\Admin\Traits\HasUploadedFile;
use Zx\Admin\Widgets\Form;
use Illuminate\Http\Request;

class HandleFormController
{
    use HasUploadedFile;

    public function handle(Request $request)
    {
        $form = $this->resolveForm($request);

        if (! $form->passesAuthorization()) {
            return $form->failedAuthorization();
        }

        $form->form();

        if ($errors = $form->validate($request)) {
            return $form->validationErrorsResponse($errors);
        }

        $input = $form->sanitize($request->all());

        return $this->sendResponse($form->handle($input));
    }

    public function uploadFile(Request $request)
    {
        $form = $this->resolveForm($request);

        $form->form();

        /* @var $field File */
        $field = $form->field($this->uploader()->upload_column);

        return $field->upload($this->file());
    }

    public function destroyFile(Request $request)
    {
        $form = $this->resolveForm($request);

        $form->form();

        /* @var $field File */
        $field = $form->field($request->_column);

        $field->deleteFile($request->key);

        return $this->responseDeleted();
    }

    /**
     * @param Request $request
     *
     * @throws AdminException
     *
     * @return Form
     */
    protected function resolveForm(Request $request)
    {
        if (! $request->has(Form::REQUEST_NAME)) {
            throw new AdminException('Invalid form request.');
        }

        $formClass = $request->get(Form::REQUEST_NAME);

        if (! class_exists($formClass)) {
            throw new AdminException("Form [{$formClass}] does not exist.");
        }

        /** @var Form $form */
        $form = app($formClass);

        if (! method_exists($form, 'handle')) {
            throw new AdminException("Form method {$formClass}::handle() does not exist.");
        }

        return $form;
    }

    protected function sendResponse($response)
    {
        if ($response instanceof JsonResponse) {
            return $response->send();
        }

        return $response;
    }
}
