document.addEventListener("DOMContentLoaded", function () {

    // const p = new Promise((resolve, reject) => {
    //     resolve(15);
    // })
    //     .then((n) => {
    //         console.log(n);
    //         return 55;
    //     })
    //     .then((n2) => {
    //         console.log("le nombre 2", n2);
    //     })
    //     .catch((err) => {
    //         console.log("Echec", err);
    //     })
    //     .finally(function () {
    //         console.log("Finnnnayl");
    //     })
    // console.log(p);

    function wait(duration) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                resolve(duration);
            }, duration)
        })
    }




    function waitAndFail(duration) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                reject(duration);
            }, duration)

        })
    }

    const main = async function main() {
        console.log("begin");
        try {

            const duration = await wait(4000);
            console.log("one", duration);
            await wait(1000);
            console.log("two");
        } catch (e) {
            console.log("Error", e);
        }

    }
    const main2 = async function main() {
        console.log("begin");
        try {

            await waitAndFail(4000);
            console.log("one");
            await wait(1000);
            console.log("two");
        } catch (e) {
            console.log("Error", e);
        }

    }

    // main();


    // wait(2000)
    //     .then(function () {
    //         console.log("Attente 2s");
    //         return wait(2000);
    //     })
    //     .then(function () {
    //         console.log("la trois");
    //         return waitAndFail(5000);
    //     })
    //     .catch(function (err) {
    //         console.log("error", err);
    //     })


    Promise.all([waitAndFail(7000), wait(4000)])
        .then(console.log)
        .catch(console.log)




})