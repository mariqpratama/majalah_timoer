import "./bootstrap";
import Swiper from "swiper";
import "swiper/css";

const swiper = new Swiper(".swiper", {
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
});
