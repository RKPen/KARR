const http = require('http');
const readline = require('readline');
const fs = require('fs');
const bcrypt = require('bcrypt');
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

const usersFile = fs.readFileSync('users.json');
const usersOriginal = JSON.parse(usersFile).Users;
const users = JSON.parse(usersFile).Users;


rl.question('Enter your username: ', (username) => {
    rl.question('Enter your password: ', (password) => {

        for (let user of users) {
            const hashedPassword = bcrypt.hashSync(user.password, 10);
            user.password = hashedPassword;
        }

        const updatedData = JSON.stringify({ Users: users });
        fs.writeFileSync('users1.json', updatedData);

        console.log('Passwords encrypted and saved to users1.json');


        const userCheck = usersOriginal.find((u) => u.aubnet === username && u.password === password);
        if (userCheck) {
            console.log('Login successful :)');
        } else {
            console.log('Unsuccessful Login!');
        }

        const userCheckEncrypt = users.find((u) => u.aubnet === username && bcrypt.compare(password, u.password));
        if (userCheckEncrypt) {
            console.log('Login successful :) Encrypted');
        } else {
            console.log('Unsuccessful Login! Encrypted');
        }


        const server = http.createServer((req, res) => {
            res.writeHead(200, { 'Content-Type': 'text/plain' });
            res.write(`Username: ${username}\nPassword: ${password}\n`);
            if (userCheck) {
                res.write('Login successful :)');
            } else {
                res.write('Unsuccessful Login!');
            }
            res.end();
        });

        server.listen(8080, () => {
            console.log(`Server running at http://localhost:8080/`);
        });
    });
});