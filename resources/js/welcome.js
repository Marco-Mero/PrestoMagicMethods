// let CategoryObserver = new IntersectionObserver((entries, observer) => {

// };
const categoryWrapper = document.querySelector(".category-nav");
const categoryDrop = document.querySelector(".category-drop");

const observeGone = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting && entry.intersectionRatio === 0) {
            observer.unobserve(entry.target); // Stop observing the target element
        }
    });
});

observeGone.observe(target);
