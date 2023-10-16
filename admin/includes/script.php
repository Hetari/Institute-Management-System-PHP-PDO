<style>
    noscript .modal-window {
        position: fixed;
        background-color: #c7133e;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 999;
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s;
    }

    noscript .modal-window:target {
        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }

    noscript .modal-window>div {
        width: 400px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 2em;
        background: white;
    }

    noscript .modal-window header {
        font-weight: bold;
    }

    noscript .modal-window h1 {
        font-size: 150%;
        margin: 0 0 15px;
    }

    noscript .modal-close {
        color: #aaa;
        line-height: 50px;
        font-size: 80%;
        position: absolute;
        right: 0;
        text-align: center;
        top: 0;
        width: 70px;
        text-decoration: none;
    }

    noscript .modal-close:hover {
        color: black;
    }

    /* Demo Styles */
    noscript html,
    noscript body {
        height: 100%;
    }

    noscript html {
        font-size: 18px;
        line-height: 1.4;
    }

    noscript body {
        font-family: apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        font-weight: 600;
        background-image: linear-gradient(to right, #7f53ac 0, #657ced 100%);
        color: black;
    }

    noscript a {
        color: inherit;
        text-decoration: none;
        text-transform: none !important;
    }

    noscript .container {
        display: grid;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    noscript .modal-window>div {
        border-radius: 1rem;
    }

    noscript .modal-window div:not(:last-of-type) {
        margin-bottom: 15px;
    }

    noscript .logo {
        max-width: 150px;
        display: block;
    }

    noscript small {
        color: lightgray;
    }

    noscript .btn {
        background-color: #c7133e;
        color: white;
        padding: 1em 1.5em;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: bold;

        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transition: all 0.2s ease-in-out;
    }

    noscript .btn:hover {
        background-color: rgba(190, 15, 60, 0.9);
        color: white;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    noscript .btn i {
        padding-right: 0.3em;
    }
</style>
<noscript>
    <div class="container">
        <div class="interior">
            <a class="btn" href="#open-modal">👀 What's going on! Click me for details</a>
        </div>
    </div>
    <div id="open-modal" class="modal-window">
        <div>
            <a href="#" title="Close" class="modal-close">Close</a>
            <h1>No JavaScript!</h1>
            <div>Please check your browser and enable the JavaScript</div>
            <br>
        </div>
    </div>
    </div>
</noscript>