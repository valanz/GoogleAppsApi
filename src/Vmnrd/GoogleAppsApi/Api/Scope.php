<?php declare(strict_types=1);
namespace Vmnrd\GoogleAppsApi\Api;

class Scope
{
    /**
     * @link https://developers.google.com/drive/v2/web/scopes#google_drive_scopes
     */
    const DRIVE = 'https://www.googleapis.com/auth/drive';
    const DRIVE_READONLY = 'https://www.googleapis.com/auth/drive.readonly';
    const DRIVE_APPFOLDER = 'https://www.googleapis.com/auth/drive.appfolder';
    const DRIVE_APPS_READONLY = 'https://www.googleapis.com/auth/drive.apps.readonly';
    const DRIVE_FILE = 'https://www.googleapis.com/auth/drive.file';
    const DRIVE_INSTALL = 'https://www.googleapis.com/auth/drive.install';
    const DRIVE_METADATA = 'https://www.googleapis.com/auth/drive.metadata';
    const DRIVE_METADATA_READONLY = 'https://www.googleapis.com/auth/drive.metadata.readonly';
    const DRIVE_PHOTOS_READONLY = 'https://www.googleapis.com/auth/drive.photos.readonly';
    const DRIVE_SCRIPTS = 'https://www.googleapis.com/auth/drive.scripts';

    /**
     * @link https://developers.google.com/gmail/api/auth/scopes#gmail_scopes
     */
    const GMAIL = 'https://mail.google.com/';
    const GMAIL_READONLY = 'https://www.googleapis.com/auth/gmail.readonly';
    const GMAIL_COMPOSE = 'https://www.googleapis.com/auth/gmail.compose';
    const GMAIL_SEND = 'https://www.googleapis.com/auth/gmail.send';
    const GMAIL_INSERT = 'https://www.googleapis.com/auth/gmail.insert';
    const GMAIL_LABELS = 'https://www.googleapis.com/auth/gmail.labels';
    const GMAIL_MODIFY = 'https://www.googleapis.com/auth/gmail.modify';
}
