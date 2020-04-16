
db.createUser({
    user: "app",
    pwd: "passwordApp",
    roles: [
      {
        role: "readWrite",
        db: "laravel-dev",
      },
    ],
  });
  
  db.createUser({
    user: "root",
    pwd: "passwordRoot",
    roles: [
      {
        role: "readWrite",
        db: "admin",
      },
    ],
  });