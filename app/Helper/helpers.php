<?php

function getUserAvatar($path)
{
    if (isset($path)) {
        return url("storage/{$path}");
    } else {
        //return '/app/assets/images/avatar_default.png';
        return url('app/images/avatar_default.png');
    }
}

function formatStatus($status)
{
    return $status == 1 ? ['bg-success', 'Ativo'] : ['bg-danger', 'Inativo'];
}