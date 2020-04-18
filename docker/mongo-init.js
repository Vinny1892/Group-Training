
db.auth('root', 'passwordRoot')

db = db.getSiblingDB('app')

db.createUser({
  user: "app",
  pwd: "passwordApp",
  roles: [
    {
      role: "readWrite",
      db: "app",
    },
  ],
});