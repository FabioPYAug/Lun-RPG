<style>

.btn-contato button {
    padding: 8px 16px;
    font-size: 16px;
    cursor: pointer;
}

.particle-container {
    position: fixed;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
    top: 0;
    left: 0;
    z-index: -1;
}

.particle {
    position: absolute;
    bottom: 0;
    width: 1px;
    height: 12px;
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.6), 0 0 5px rgba(255, 255, 255, 0.4);
    animation: moveUp linear infinite;
    opacity: 0;
}

@keyframes moveUp {
    0% {
        opacity: 1;
        transform: translateY(0) scale(1);
        height: 15px;
    }
    25% {
        opacity: 0.8;
        transform: translateY(-150px) scale(2);
        height: 30px;
    }
    50% {
        opacity: 0.5;
        transform: translateY(-300px) scale(3.0);
        height: 100px;
    }
    50% {
        opacity: 0.2;
        transform: translateY(-450px) scale(4.0);
        height: 60px;
    }
    100% {
        opacity: 0;
        transform: translateY(-900px) scale(5.0);
        height: 10px;
        
    }
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

html {
    height: 100%;
    background-color: #1a1a1a;
}

.container {
    max-width: 1280px;
    margin: auto;
}

.flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.btn-contato a {
    margin-right: 30px; 
}

.btn-contato button {
    border-radius: 99px;
    font-size: 20px;
    width: 120px;
    height: 40px;
    border: 0;
    background-color: #6200ea;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.btn-contato button:hover {
    background-color: #3700b3;
    transform: scale(1.1); 
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
}

.btn-contato button:active {
    transform: scale(1.10); 
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2); 
}

.banner-2 {
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    color: #d0c7f7;

    text-align: center;
}

.search {
    display: flex;
    align-items: center;
    border: 2px solid #4a4a5d;
    background-color: rgba(46, 46, 58, 0.8);
    width: 100%;
    max-width: 750px;
    border-radius: 20px;
    padding: 10px;
    margin: 20px auto;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

#searchInput {
    padding: 8px;
    border: none;
    background-color: transparent;
    width: 100%;
    outline: none;
    font-size: 20px;
    color: #d0c7f7;
}

#resultado {
    max-height: 300px;
    overflow-y: auto;
    scrollbar-color: #bb86fc rgba(72, 61, 139, 0.2);
    scrollbar-width: thin;
}
#resultado::-webkit-scrollbar {
    width: 8px;
}
#resultado::-webkit-scrollbar-thumb {
    background-color: #bb86fc;
    border-radius: 10px;
}


.banner {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    background-attachment: fixed;
    flex-direction: column; 
}

@media (max-width: 768px) {
    .search {
        width: 90%;
    }

    #resultado {
        width: 90%;
    }
    .btn-contato button {
        font-size: 16px;
        width: 100px;
        height: 35px;
    }
}

h6 {
    margin: 20px 0 0 0;
    padding: 0;
    box-sizing: border-box;
    color: #d0c7f7;
    font-size: 25px;
    text-align: center;
}

.custom-btn {
    width: 750px;
    height: 40px;
    color: #d0c7f7;
    border-radius: 5px;
    padding: 10px 25px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
    outline: none;
}

.btn-1 {
    background: rgba(72, 61, 139, 0.3);
    border: none;
}

.btn-1:hover {
    background: rgba(72, 61, 139, 0.6);
    border-color: #bb86fc;
}

.item-left, .item-center, .item-right {
    background: transparent;
}


</style>