<?php

if (!function_exists('handleFileUpload')) {
    function handleFileUpload($file, $oldFilePath, $destinationPath, $fieldName, &$validatedData, $customFileName = null) {
        // Hapus file lama jika ada
        if ($oldFilePath) {
            $oldFileFullPath = public_path($destinationPath . $oldFilePath);
            if (file_exists($oldFileFullPath)) {
                unlink($oldFileFullPath);
            }
        }

        // Tentukan nama file baru
        if ($customFileName) {
            $newFileName = str_replace(' ', '_', $customFileName) . '.' . $file->getClientOriginalExtension();
        } else {
            $newFileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        }

        // Pindahkan file ke direktori yang diinginkan
        $file->move(public_path($destinationPath), $newFileName);

        // Simpan nama file dalam array validatedData
        $validatedData[$fieldName] = $newFileName;
    }
}
