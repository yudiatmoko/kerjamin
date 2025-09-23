export default function initDotsScroll() {
    document.querySelectorAll(".dots-wrapper").forEach((wrapper) => {
        const scrollContainer = wrapper.querySelector(".scroll-container");
        const dotsIndicator = wrapper.querySelector(".dots-indicator");

        if (!scrollContainer || !dotsIndicator) return;

        let pageCount = Math.ceil(
            scrollContainer.scrollWidth / scrollContainer.clientWidth
        );

        pageCount = Math.max(pageCount, 1);

        dotsIndicator.innerHTML = "";

        for (let i = 0; i < pageCount; i++) {
            const dot = document.createElement("button");
            dot.classList.add("dot");
            dot.addEventListener("click", () => {
                scrollContainer.scrollTo({
                    left: i * scrollContainer.clientWidth,
                    behavior: "smooth",
                });
            });
            dotsIndicator.appendChild(dot);
        }

        const dots = dotsIndicator.children;
        if (dots.length > 0) dots[0].classList.add("active");

        const updateDots = () => {
            const scrollLeft = scrollContainer.scrollLeft;
            const maxScroll =
                scrollContainer.scrollWidth - scrollContainer.clientWidth;

            let activeIndex = 0;
            if (maxScroll > 0) {
                const ratio = scrollLeft / maxScroll;
                activeIndex = Math.round(ratio * (dots.length - 1));
            }

            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.toggle("active", i === activeIndex);
            }
        };

        scrollContainer.addEventListener("scroll", updateDots, {
            passive: true,
        });
        window.addEventListener("resize", updateDots);
    });
}
