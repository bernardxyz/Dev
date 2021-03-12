<?php

namespace App\Controller\Common;

use App\Presentation\Service\UserBuilder;
use App\Service\UploadService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadController extends BaseController
{
    /**
     * @Route("/avatar", methods={"POST"})
     */
    public function uploadAvatar(
        UploadService $uploadService,
        UserBuilder $userBuilder
    )
    {
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $this->makeCommandFromUpload();
        $user = $uploadService->uploadAvatar($this->getUser(), $uploadedFile);

        return $this->json(
            [
                'user' => $userBuilder->buildSingle($user)
            ]
        );
    }
}
