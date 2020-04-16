db.createUser(
    {
        user: 'admin',
        pwd: 'passwordRoot',
        roles: [
            {
                role: "readWrite",
                db: "laravel-dev"
            }
        ]
    }
);