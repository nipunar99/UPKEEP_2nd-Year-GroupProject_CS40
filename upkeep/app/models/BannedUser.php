<?php

    class BannedUser{

        use Model;
        protected $table = "banned_user";

        protected $allowedColumns = [
            "user_id",
            "admin_id",
            "reason",
        ];



}