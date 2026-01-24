document.addEventListener("DOMContentLoaded", function () {

    // fetch("https://jsonplaceholder.typicode.com/users")
    //     .then(function (r) {
    //         return r.json();
    //     })
    //     .then(function (r) {
    //         console.log(r);
    //     })
    //     .catch(function (err) {
    //         console.log(err);
    //     })

    fetchUsers().then(function (users) {
        console.log(users);
    })
        .catch(function (error) {
            // console.log("MY ERROR ==>", error);


        })





})

async function fetchUsers() {
    const r = await fetch("https://jsonplaceholder.typicode.com/users?limit=5&_delay=2000", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ title: "mon Premier" })
    });
    if (r.ok === true) {
        return r.json();
    }
    throw new Error("impossilbe ");
}