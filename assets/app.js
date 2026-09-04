document.addEventListener(
    "DOMContentLoaded",
    function () {

        const forms =
            document.querySelectorAll("form");

        forms.forEach(function (form) {

            form.addEventListener(
                "submit",
                function () {

                    const button =
                        form.querySelector(
                            "button[type='submit']"
                        );

                    if (button) {

                        button.style.opacity =
                            "0.7";

                    }

                }
            );

        });

        const menuButton =
            document.querySelector(
                ".mobile-menu"
            );

        const navigation =
            document.querySelector(
                ".main-nav"
            );

        if (
            menuButton &&
            navigation
        ) {

            menuButton.addEventListener(
                "click",
                function () {

                    navigation.classList.toggle(
                        "show"
                    );

                }
            );

        }

    }
);