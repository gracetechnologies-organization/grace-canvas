<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Custom File For Storing Message Constants
    |--------------------------------------------------------------------------
    |
    | This file contains all the constants which are used in our application
    | to display any kind of messages
    |
    */

    /* Success Constants */
    'INSERTION_SUCCESS' => 'Data inserted successfully.',
    'UPDATION_SUCCESS' => 'Data updated successfully.',
    'ARCHIVED_SUCCESS' => 'Data archived successfully.',
    'UN_ARCHIVED_SUCCESS' => 'Data unarchived successfully.',
    'DELETION_SUCCESS' => 'Data deleted successfully.',
    'SUCCESS_CODE' => 1,
    'BACKUP_CREATION_SUCCESS' => 'Your backup has been created successfully.',
    'BACKUP_DOWNLOADING_SUCCESS' => 'Your backup has been downloaded successfully.',
    'BACKUP_DELETION_SUCCESS' => 'Your backup has been deleted successfully.',
    'TOKEN_GENERATED_SUCCESS' => 'A token against your app has been generated successfully.',
    'TOKEN_RESET_SUCCESS' => 'Token reset successfully.',
    'TOKEN_DESTROYED_SUCCESS' => 'Token has been destroyed successfully.',
    'CACHE_DESTROYED_SUCCESS' => 'All cached data by your application has been removed seccessfully',
    /* Failure Constants */
    'INSERTION_FAILED' => 'Failed to insert data.',
    'UPDATION_FAILED' => 'Failed to update data.',
    'ARCHIVED_FAILED' => 'Failed to archive data.',
    'UN_ARCHIVED_FAILED' => 'Failed to unarchive data.',
    'DELETION_FAILED' => 'Failed to delete data.',
    'INVALID_DATA' => 'You have entered invalid or too long data.',
    'FAILED_CODE' => 0,
    'STATUS_CHANGING_FAILED' => 'Failed to change the activation status.',
    'EMPTY_ROW_DELETION' => 'You have deleted a empty row.',
    'BACKUP_CREATION_FAILED' => 'Failed to create a backup.',
    'BACKUP_DOWNLOADING_FAILED' => 'Failed to download your backup.',
    'BACKUP_DELETION_FAILED' => 'Failed to delete your backup.',
    'TOKEN_GENERATED_FAILED' => 'Failed to generate a token against your app, It already exists.',
    'TOKEN_RESET_FAILED' => 'Token reset failed.',
    'TOKEN_DESTROYED_FAILED' => 'Failed to destroy the token.',
    'TOKEN_INVALID' => 'Invalid token.',
    'TOEKN_NOT_PROVIDED' => 'Please provide token for authentication',
    'CACHE_DESTROYED_FAILED' => 'There is no cache against this key',
    'PARAM_MISSING' => 'Some required parameters are missing.',
    'NO_RECORD' => 'No record found.',
    'ARRAYS_NOT_EQUAL' => 'Thumbnails & FrontImages should be equal in number.',
    'TYPE_NA' => 'The "Type" which you have entered is not available in our system',
    'EXPERIENCES_LIMIT_REACHED' => 'You can only add 2 experiences',
    'QUALIFICATIONS_LIMIT_REACHED' => 'You can only add 2 qualifications',
    'SKILLS_LIMIT_REACHED' => 'You can only add 4 skills',
    'ACHIEVEMENTS_LIMIT_REACHED' => 'You can only add 4 achievements',
    'PROJECTS_LIMIT_REACHED' => 'You can only add 4 projects',
    /* HTTP Codes Constants */
    'HTTP_SUCCESS_CODE' => 200,
    'HTTP_SERVER_ERROR_CODE' => 500,
    'HTTP_UNPROCESSABLE_DATA' => 422
];