<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update website</title>
    <style type="text/css">
        *{
            padding: 0;
            margin: 0px;
        }
        #bubbles-bg {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
            -webkit-animation: bgcolor 20s linear infinite;
            animation: bgcolor 20s linear infinite;
            top: 0px;
            position: absolute;
            z-index: 0;
        }
         #bubbles-bg span {
             position: absolute;
             width: 80px;
             height: 80px;
             display: block;
             background-color: #fff;
             -webkit-animation: animate 10s linear infinite;
             animation: animate 10s linear infinite;
        }
         #bubbles-bg span:nth-child(3n + 1) {
             background-color: transparent;
             border: 2px solid #fff;
        }
         #bubbles-bg span:nth-child(1) {
             top: 50%;
             left: 20%;
        }
         #bubbles-bg span:nth-child(2) {
             top: 80%;
             left: 40%;
             -webkit-animation: animate 12s linear infinite;
             animation: animate 12s linear infinite;
        }
         #bubbles-bg span:nth-child(3) {
             top: 10%;
             left: 65%;
             -webkit-animation: animate 15s linear infinite;
             animation: animate 15s linear infinite;
        }
         #bubbles-bg span:nth-child(4) {
             top: 50%;
             left: 70%;
             -webkit-animation: animate 6s linear infinite;
             animation: animate 6s linear infinite;
        }
         #bubbles-bg span:nth-child(5) {
             top: 10%;
             left: 30%;
             -webkit-animation: animate 9s linear infinite;
             animation: animate 9s linear infinite;
        }
         #bubbles-bg span:nth-child(6) {
             top: 90%;
             left: 95%;
             -webkit-animation: animate 8s linear infinite;
             animation: animate 8s linear infinite;
        }
         #bubbles-bg span:nth-child(7) {
             top: 80%;
             left: 5%;
             -webkit-animation: animate 5s linear infinite;
             animation: animate 5s linear infinite;
        }
         #bubbles-bg span:nth-child(8) {
             top: 35%;
             left: 50%;
             -webkit-animation: animate 14s linear infinite;
             animation: animate 14s linear infinite;
        }
         #bubbles-bg span:nth-child(9) {
             top: 5%;
             left: 5%;
             -webkit-animation: animate 11s linear infinite;
             animation: animate 11s linear infinite;
        }
         #bubbles-bg span:nth-child(10) {
             top: 25%;
             left: 90%;
        }
         @-webkit-keyframes animate {
             0% {
                 -webkit-transform: scale(0) translateY(0) rotate(0deg);
                 transform: scale(0) translateY(0) rotate(0deg);
                 opacity: 1;
            }
             100% {
                 -webkit-transform: scale(1) translateY(-100px) rotate(360deg);
                 transform: scale(1) translateY(-100px) rotate(360deg);
                 opacity: 0;
            }
        }
         @keyframes animate {
             0% {
                 -webkit-transform: scale(0) translateY(0) rotate(0deg);
                 transform: scale(0) translateY(0) rotate(0deg);
                 opacity: 1;
            }
             100% {
                 -webkit-transform: scale(1) translateY(-100px) rotate(360deg);
                 transform: scale(1) translateY(-100px) rotate(360deg);
                 opacity: 0;
            }
        }
         @-webkit-keyframes bgcolor {
             0% {
                 background-color: #f44336;
            }
             25% {
                 background-color: #03a9f4;
            }
             50% {
                 background-color: #9c27b0;
            }
             75% {
                 background-color: #23c214;
            }
             100% {
                 background-color: #f44336;
            }
        }
         @keyframes bgcolor {
             0% {
                 background-color: #f44336;
            }
             25% {
                 background-color: #03a9f4;
            }
             50% {
                 background-color: #9c27b0;
            }
             75% {
                 background-color: #23c214;
            }
             100% {
                 background-color: #f44336;
            }
        }
        .postion-svg{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .postion-svg svg{
            max-width: 100%;
        }
        .stroke-l {
            fill: none;
            stroke: #fff;
            stroke-miterlimit: 10;
            stroke-width: 1;
            stroke-dasharray: 1000;
            stroke-dashoffset: 3000
        }

        .stroke-l {
            -webkit-animation-name: StrokeAni;
            animation-name: StrokeAni;
            -webkit-animation-duration: 8s;
            animation-duration: 8s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-direction: alternate;
            animation-direction: alternate;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
        }
        @-webkit-keyframes StrokeAni {
            100% {
                stroke-dashoffset: 0
            }
        }
        @keyframes StrokeAni {
            100% {
                stroke-dashoffset: 0
            }
        }
    </style>
</head>
<body>
    <div id="bubbles-bg">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="postion-svg">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="1000px" height="120px" viewBox="0 0 1000 120" style="enable-background:new 0 0 1000 120;" xml:space="preserve">
<g>
    <path class="stroke-l" d="M76.064,18.9v18.844h-8.837
        c-1.04-4.895-2.687-8.501-4.938-10.819c-2.253-2.317-5.198-3.476-8.837-3.476c-6.845,0-12.021,3.281-15.53,9.844
        c-3.509,6.563-5.264,16.3-5.264,29.209c0,12,1.602,21.086,4.809,27.259c3.206,6.174,7.905,9.26,14.101,9.26
        c3.162,0,5.739-0.529,7.732-1.592c1.992-1.061,3.584-2.653,4.776-4.776c1.191-2.122,2.219-5.11,3.086-8.967h8.902v19.689
        c-4.766,1.127-9.12,1.949-13.061,2.469c-3.942,0.52-8.036,0.78-12.281,0.78c-9.011,0-16.365-1.625-22.061-4.874
        c-5.697-3.249-9.899-8.155-12.606-14.718c-2.708-6.563-4.062-14.87-4.062-24.92c0-9.4,1.592-17.578,4.776-24.53
        c3.184-6.953,7.873-12.314,14.068-16.083c6.194-3.769,13.602-5.653,22.224-5.653c4.375,0,8.339,0.239,11.891,0.715
        C68.504,17.038,72.208,17.818,76.064,18.9z"/>
    <path class="stroke-l" d="M124.8,106.625c-12.736,0-22.299-3.726-28.689-11.177
        c-6.391-7.451-9.584-18.606-9.584-33.465c0-9.748,1.548-18.075,4.646-24.985c3.097-6.909,7.657-12.162,13.678-15.758
        c6.021-3.595,13.191-5.394,21.509-5.394c12.953,0,22.679,3.715,29.177,11.144c6.498,7.43,9.747,18.466,9.747,33.108
        c0,8.188-0.965,15.217-2.892,21.086c-1.928,5.871-4.668,10.689-8.22,14.458c-3.553,3.77-7.809,6.542-12.769,8.317
        C136.442,105.736,130.908,106.625,124.8,106.625z M107.19,60.228c0,13.083,1.57,22.82,4.711,29.209
        c3.14,6.391,7.938,9.584,14.393,9.584c3.335,0,6.173-0.898,8.513-2.696c2.339-1.797,4.234-4.311,5.686-7.538
        c1.451-3.227,2.491-7.05,3.119-11.469c0.627-4.419,0.942-9.271,0.942-14.556c0-8.62-0.682-15.844-2.047-21.671
        c-1.365-5.826-3.423-10.223-6.173-13.191c-2.751-2.967-6.271-4.451-10.559-4.451c-6.282,0-10.95,3-14.003,9
        C108.717,38.45,107.19,47.709,107.19,60.228z"/>
    <path class="stroke-l" d="M278.48,21.175c-2.297,0.65-3.856,1.354-4.679,2.112
        c-0.824,0.758-1.397,1.777-1.722,3.054c-0.325,1.278-0.487,3.542-0.487,6.791V89.34c0,2.643,0.13,4.733,0.39,6.271
        c0.26,1.538,0.79,2.708,1.592,3.509c0.801,0.803,2.437,1.527,4.906,2.177v4.289h-33.335v-4.289c1.906-0.52,3.227-0.975,3.964-1.364
        c0.736-0.39,1.31-0.898,1.722-1.527c0.411-0.627,0.714-1.581,0.91-2.859c0.195-1.276,0.292-3.389,0.292-6.335V57.369
        c0-3.509,0.065-7.646,0.195-12.412c0.13-4.765,0.26-8.144,0.39-10.137h-1.364c-0.52,1.733-1.072,3.434-1.657,5.101
        c-0.585,1.668-1.679,4.646-3.282,8.935l-17.415,46.916h-11.437l-18.324-52.699c-1.083-2.989-2.037-5.956-2.859-8.902h-1.169
        c0.432,7.148,0.649,15.595,0.649,25.343v29.891c0,3.207,0.151,5.438,0.455,6.693c0.303,1.257,0.91,2.297,1.819,3.119
        c0.91,0.823,2.491,1.517,4.744,2.079v4.289h-24.563v-4.289c1.602-0.433,2.869-0.909,3.801-1.43c0.931-0.52,1.635-1.212,2.112-2.079
        c0.476-0.866,0.769-1.971,0.877-3.313c0.107-1.343,0.162-3.055,0.162-5.134V33.131c0-3.292-0.141-5.545-0.422-6.758
        c-0.282-1.212-0.834-2.209-1.657-2.989c-0.824-0.779-2.448-1.516-4.874-2.209v-4.289h32.295l18,53.35l19.495-53.35h30.476V21.175z"
        />
    <path class="stroke-l" d="M391.092,21.175c-2.297,0.65-3.856,1.354-4.679,2.112
        c-0.824,0.758-1.397,1.777-1.722,3.054c-0.325,1.278-0.487,3.542-0.487,6.791V89.34c0,2.643,0.13,4.733,0.39,6.271
        c0.26,1.538,0.79,2.708,1.592,3.509c0.801,0.803,2.437,1.527,4.906,2.177v4.289h-33.335v-4.289c1.906-0.52,3.227-0.975,3.964-1.364
        c0.736-0.39,1.31-0.898,1.722-1.527c0.411-0.627,0.714-1.581,0.91-2.859c0.195-1.276,0.292-3.389,0.292-6.335V57.369
        c0-3.509,0.065-7.646,0.195-12.412c0.13-4.765,0.26-8.144,0.39-10.137h-1.364c-0.52,1.733-1.072,3.434-1.657,5.101
        c-0.585,1.668-1.679,4.646-3.282,8.935l-17.415,46.916h-11.437L311.75,43.073c-1.083-2.989-2.037-5.956-2.859-8.902h-1.169
        c0.432,7.148,0.649,15.595,0.649,25.343v29.891c0,3.207,0.151,5.438,0.455,6.693c0.303,1.257,0.91,2.297,1.819,3.119
        c0.91,0.823,2.491,1.517,4.744,2.079v4.289h-24.563v-4.289c1.602-0.433,2.869-0.909,3.801-1.43c0.931-0.52,1.635-1.212,2.112-2.079
        c0.476-0.866,0.769-1.971,0.877-3.313c0.107-1.343,0.162-3.055,0.162-5.134V33.131c0-3.292-0.141-5.545-0.422-6.758
        c-0.282-1.212-0.834-2.209-1.657-2.989c-0.824-0.779-2.448-1.516-4.874-2.209v-4.289h32.295l18,53.35l19.495-53.35h30.476V21.175z"
        />
    <path class="stroke-l" d="M430.73,89.274c0,1.518,0.042,2.925,0.13,4.224
        c0.086,1.3,0.26,2.362,0.52,3.185c0.26,0.823,0.639,1.517,1.137,2.079c0.498,0.563,1.18,1.051,2.047,1.462
        c0.866,0.413,1.927,0.77,3.184,1.072v4.289h-34.115v-4.289c1.602-0.433,2.869-0.898,3.801-1.396c0.931-0.498,1.625-1.191,2.08-2.08
        c0.455-0.887,0.747-2.014,0.877-3.379c0.13-1.364,0.195-3.086,0.195-5.166V33.196c0-2.08-0.055-3.791-0.162-5.134
        c-0.109-1.342-0.39-2.458-0.845-3.346c-0.455-0.888-1.148-1.592-2.08-2.112c-0.932-0.52-2.221-0.996-3.866-1.43v-4.289h34.115
        v4.289c-1.777,0.477-3.086,0.986-3.931,1.527c-0.845,0.542-1.484,1.202-1.917,1.982c-0.434,0.78-0.737,1.798-0.91,3.054
        c-0.174,1.257-0.26,3.098-0.26,5.523V89.274z"/>
    <path class="stroke-l" d="M528.916,16.886v4.289c-1.732,0.563-2.957,1.04-3.672,1.43
        c-0.713,0.39-1.32,0.91-1.818,1.559c-0.498,0.65-0.877,1.636-1.137,2.957c-0.26,1.322-0.391,3.346-0.391,6.076v72.389h-16.505
        L476.152,55.03c-3.942-6.844-6.845-12.216-8.708-16.115h-0.584c0.432,9.314,0.649,19.148,0.649,29.501V89.34
        c0,3.249,0.163,5.523,0.488,6.823c0.325,1.299,0.91,2.329,1.754,3.086c0.845,0.759,2.437,1.441,4.776,2.047v4.289h-24.563v-4.289
        c1.602-0.433,2.869-0.909,3.801-1.43c0.931-0.52,1.625-1.223,2.079-2.111c0.455-0.888,0.748-2.003,0.877-3.347
        c0.13-1.342,0.195-3.031,0.195-5.068V33.131c0-3.249-0.141-5.491-0.422-6.726c-0.282-1.235-0.867-2.263-1.754-3.087
        c-0.888-0.822-2.48-1.537-4.776-2.144v-4.289h26.317l23.003,39.963c1.43,2.513,3.291,5.914,5.588,10.202
        c2.297,4.289,4.332,8.341,6.109,12.152h1.039c-0.477-10.354-0.715-21.661-0.715-33.92V33.196c0-2.815-0.109-4.852-0.324-6.108
        c-0.219-1.256-0.553-2.209-1.008-2.859c-0.455-0.65-1.063-1.191-1.82-1.625c-0.758-0.433-2.025-0.91-3.801-1.43v-4.289H528.916z"/>
    <path class="stroke-l" d="M608.713,19.29v18.455h-8.902
        c-0.996-3.639-2.135-6.443-3.412-8.415c-1.277-1.971-2.924-3.444-4.938-4.418s-4.604-1.462-7.766-1.462
        c-4.289,0-8.08,1.311-11.371,3.931c-3.293,2.622-5.893,6.802-7.799,12.542c-1.906,5.74-2.857,13.007-2.857,21.801
        c0,7.582,0.639,14.156,1.916,19.722c1.277,5.567,3.227,9.889,5.848,12.964c2.621,3.076,5.859,4.613,9.715,4.613
        c3.813,0,6.629-1.137,8.447-3.411c1.82-2.274,2.73-5.902,2.73-10.885v-2.469c0-3.292-0.109-5.643-0.326-7.051
        c-0.217-1.407-0.551-2.458-1.006-3.151c-0.455-0.692-1.051-1.256-1.787-1.689c-0.738-0.433-2.037-0.931-3.898-1.494v-4.289h33.27
        v4.289c-2.166,0.649-3.639,1.387-4.418,2.209c-0.781,0.823-1.313,1.917-1.594,3.281c-0.281,1.365-0.422,3.282-0.422,5.751v24.498
        l-9.357,1.949l-4.418-4.679c-5.156,3.163-11.07,4.744-17.74,4.744c-12.65,0-22.084-3.693-28.299-11.08
        c-6.217-7.385-9.324-18.573-9.324-33.562c0-7.884,1.104-14.816,3.313-20.794c2.211-5.979,5.273-10.841,9.195-14.588
        c3.92-3.747,8.34-6.476,13.256-8.188c4.916-1.711,10.191-2.567,15.824-2.567C592.078,15.846,600.785,16.995,608.713,19.29z"/>
    <path class="stroke-l" d="M664.012,83.687c1.082,5.155,2.893,9,5.426,11.534
        c2.535,2.534,6.248,3.801,11.145,3.801c2.555,0,4.852-0.433,6.889-1.299c2.035-0.866,3.67-2.264,4.904-4.191
        c1.236-1.928,1.854-4.343,1.854-7.246c0-2.686-0.5-5.014-1.496-6.985c-0.996-1.971-2.598-3.844-4.809-5.62
        c-2.209-1.776-5.285-3.66-9.227-5.653c-3.379-1.69-6.434-3.444-9.162-5.264c-2.729-1.82-5.059-3.823-6.986-6.011
        c-1.928-2.187-3.422-4.582-4.482-7.181c-1.063-2.599-1.592-5.523-1.592-8.772c0-5.328,1.32-9.854,3.963-13.581
        c2.643-3.725,6.467-6.552,11.469-8.48c5.004-1.927,10.797-2.892,17.383-2.892c3.855,0,7.537,0.206,11.047,0.617
        c3.51,0.413,7.516,1.137,12.021,2.177v18.844h-8.902c-0.824-3.421-1.875-6.141-3.152-8.155c-1.277-2.014-2.869-3.498-4.775-4.451
        c-1.906-0.952-4.311-1.429-7.213-1.429c-2.469,0-4.678,0.433-6.629,1.299c-1.949,0.867-3.486,2.156-4.613,3.867
        c-1.127,1.711-1.689,3.78-1.689,6.206c0,2.513,0.488,4.689,1.463,6.53c0.975,1.842,2.609,3.639,4.906,5.394
        c2.295,1.754,5.631,3.759,10.006,6.011c5.33,2.773,9.52,5.491,12.574,8.155c3.055,2.664,5.307,5.567,6.758,8.708
        c1.451,3.142,2.178,6.79,2.178,10.949c0,5.328-1.234,9.953-3.705,13.873c-2.469,3.922-6.064,6.932-10.785,9.032
        c-4.723,2.103-10.182,3.152-16.377,3.152c-4.418,0-9.021-0.25-13.807-0.748c-4.789-0.497-9.283-1.223-13.484-2.177V83.687H664.012z
        "/>
    <path class="stroke-l" d="M763.107,106.625c-12.736,0-22.299-3.726-28.689-11.177
        s-9.584-18.606-9.584-33.465c0-9.748,1.549-18.075,4.646-24.985c3.096-6.909,7.656-12.162,13.678-15.758
        c6.021-3.595,13.191-5.394,21.51-5.394c12.951,0,22.678,3.715,29.176,11.144c6.498,7.43,9.746,18.466,9.746,33.108
        c0,8.188-0.963,15.217-2.891,21.086c-1.928,5.871-4.668,10.689-8.221,14.458c-3.553,3.77-7.809,6.542-12.768,8.317
        C774.75,105.736,769.215,106.625,763.107,106.625z M745.498,60.228c0,13.083,1.57,22.82,4.711,29.209
        c3.141,6.391,7.938,9.584,14.393,9.584c3.336,0,6.174-0.898,8.514-2.696c2.338-1.797,4.232-4.311,5.686-7.538
        c1.451-3.227,2.49-7.05,3.119-11.469c0.627-4.419,0.941-9.271,0.941-14.556c0-8.62-0.682-15.844-2.047-21.671
        c-1.363-5.826-3.422-10.223-6.172-13.191c-2.752-2.967-6.271-4.451-10.561-4.451c-6.281,0-10.949,3-14.004,9
        C747.025,38.45,745.498,47.709,745.498,60.228z"/>
    <path class="stroke-l" d="M855.641,106.625c-12.736,0-22.299-3.726-28.689-11.177
        s-9.584-18.606-9.584-33.465c0-9.748,1.549-18.075,4.646-24.985c3.096-6.909,7.656-12.162,13.678-15.758
        c6.021-3.595,13.191-5.394,21.51-5.394c12.951,0,22.678,3.715,29.176,11.144c6.498,7.43,9.746,18.466,9.746,33.108
        c0,8.188-0.963,15.217-2.891,21.086c-1.928,5.871-4.668,10.689-8.221,14.458c-3.553,3.77-7.809,6.542-12.768,8.317
        C867.283,105.736,861.748,106.625,855.641,106.625z M838.031,60.228c0,13.083,1.57,22.82,4.711,29.209
        c3.141,6.391,7.938,9.584,14.393,9.584c3.336,0,6.174-0.898,8.514-2.696c2.338-1.797,4.232-4.311,5.686-7.538
        c1.451-3.227,2.49-7.05,3.119-11.469c0.627-4.419,0.941-9.271,0.941-14.556c0-8.62-0.682-15.844-2.047-21.671
        c-1.363-5.826-3.422-10.223-6.172-13.191c-2.752-2.967-6.271-4.451-10.561-4.451c-6.281,0-10.949,3-14.004,9
        C839.559,38.45,838.031,47.709,838.031,60.228z"/>
    <path class="stroke-l" d="M988.008,16.886v4.289c-1.734,0.563-2.957,1.04-3.672,1.43
        c-0.715,0.39-1.322,0.91-1.82,1.559c-0.498,0.65-0.877,1.636-1.137,2.957c-0.26,1.322-0.389,3.346-0.389,6.076v72.389h-16.506
        L935.242,55.03c-3.941-6.844-6.846-12.216-8.707-16.115h-0.584c0.432,9.314,0.648,19.148,0.648,29.501V89.34
        c0,3.249,0.164,5.523,0.488,6.823c0.324,1.299,0.91,2.329,1.754,3.086c0.846,0.759,2.438,1.441,4.777,2.047v4.289h-24.564v-4.289
        c1.604-0.433,2.869-0.909,3.803-1.43c0.93-0.52,1.623-1.223,2.078-2.111c0.455-0.888,0.748-2.003,0.877-3.347
        c0.131-1.342,0.195-3.031,0.195-5.068V33.131c0-3.249-0.141-5.491-0.422-6.726c-0.281-1.235-0.867-2.263-1.754-3.087
        c-0.889-0.822-2.48-1.537-4.777-2.144v-4.289h26.318l23.004,39.963c1.428,2.513,3.291,5.914,5.588,10.202
        c2.295,4.289,4.33,8.341,6.107,12.152h1.039c-0.477-10.354-0.713-21.661-0.713-33.92V33.196c0-2.815-0.109-4.852-0.326-6.108
        c-0.217-1.256-0.553-2.209-1.008-2.859c-0.453-0.65-1.061-1.191-1.818-1.625c-0.758-0.433-2.025-0.91-3.801-1.43v-4.289H988.008z"
        />
</g>
</svg>
    </div>
</body>
</html>