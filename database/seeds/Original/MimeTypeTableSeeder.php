<?php

use Illuminate\Database\Seeder;
use App\Models\MimeType;

class MimeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = '1';

        $data = [
            [
                'name' => 'audio/aac',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-abiword',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/octet-stream',
                'user_id' => $user_id,
            ],
            [
                'name' => 'video/x-msvideo',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.amazon.ebook',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/octet-stream',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-bzip',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-bzip2',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-csh',
                'user_id' => $user_id,
            ],
            [
                'name' => 'text/css',
                'user_id' => $user_id,
            ],
            [
                'name' => 'text/csv',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/msword',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.ms-fontobject',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/epub+zip',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/gif',
                'user_id' => $user_id,
            ],
            [
                'name' => 'text/html',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/x-icon',
                'user_id' => $user_id,
            ],
            [
                'name' => 'text/calendar',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/java-archive',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/jpeg',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/javascript',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/json',
                'user_id' => $user_id,
            ],
            [
                'name' => 'audio/midi',
                'user_id' => $user_id,
            ],
            [
                'name' => 'video/mpeg',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.apple.installer+xml',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.oasis.opendocument.presentation',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.oasis.opendocument.spreadsheet',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.oasis.opendocument.text',
                'user_id' => $user_id,
            ],
            [
                'name' => 'audio/ogg',
                'user_id' => $user_id,
            ],
            [
                'name' => 'video/ogg',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/ogg',
                'user_id' => $user_id,
            ],
            [
                'name' => 'font/otf',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/png',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/pdf',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.ms-powerpoint',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-rar-compressed',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/rtf',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-sh',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/svg+xml',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-shockwave-flash',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-tar',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/tiff',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/typescript',
                'user_id' => $user_id,
            ],
            [
                'name' => 'font/ttf',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.visio',
                'user_id' => $user_id,
            ],
            [
                'name' => 'audio/x-wav',
                'user_id' => $user_id,
            ],
            [
                'name' => 'audio/webm',
                'user_id' => $user_id,
            ],
            [
                'name' => 'video/webm',
                'user_id' => $user_id,
            ],
            [
                'name' => 'image/webp',
                'user_id' => $user_id,
            ],
            [
                'name' => 'font/woff',
                'user_id' => $user_id,
            ],
            [
                'name' => 'font/woff2',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/xhtml+xml',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.ms-excel',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/xml',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/vnd.mozilla.xul+xml',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/zip',
                'user_id' => $user_id,
            ],
            [
                'name' => 'video/3gpp',
                'user_id' => $user_id,
            ],
            [
                'name' => 'audio/3gpp',
                'user_id' => $user_id,
            ],
            [
                'name' => 'video/3gpp2',
                'user_id' => $user_id,
            ],
            [
                'name' => 'audio/3gpp2',
                'user_id' => $user_id,
            ],
            [
                'name' => 'application/x-7z-compressed',
                'user_id' => $user_id,
            ],
        ];

        foreach ($data as $key) {
            $request = new \stdClass;
            $request->name = $key['name'];
            $request->user_id = $key['user_id'];

            $mime_type = new MimeType;
            if (count($mime_type->getMimeByName($request->name)) == 0) {
                $mime_type->addMimeType($request);
            }
        }
    }
}
