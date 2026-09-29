const socialFloat = document.getElementById('socialFloat');
const socialToggle = document.getElementById('socialToggle');

let dragging = false;
let moved = false;

let startX = 0;
let startY = 0;
let offsetX = 0;
let offsetY = 0;

socialToggle.addEventListener('click', function () {
    if (moved) {
        moved = false;
        return;
    }

    socialFloat.classList.toggle('open');
});

socialToggle.addEventListener('pointerdown', function (event) {
    event.preventDefault();

    const rect = socialFloat.getBoundingClientRect();

    dragging = true;
    moved = false;

    startX = event.clientX;
    startY = event.clientY;

    offsetX = event.clientX - rect.left;
    offsetY = event.clientY - rect.top;

    socialFloat.classList.add('dragging');

    socialToggle.setPointerCapture(event.pointerId);
});

socialToggle.addEventListener('pointermove', function (event) {
    if (!dragging) {
        return;
    }

    const moveX = Math.abs(event.clientX - startX);
    const moveY = Math.abs(event.clientY - startY);

    if (moveX > 5 || moveY > 5) {
        moved = true;
    }

    const maxX =
        window.innerWidth -
        socialFloat.offsetWidth -
        8;

    const maxY =
        window.innerHeight -
        socialFloat.offsetHeight -
        8;

    let newX = event.clientX - offsetX;
    let newY = event.clientY - offsetY;

    newX = Math.max(8, Math.min(newX, maxX));
    newY = Math.max(8, Math.min(newY, maxY));

    socialFloat.style.left = newX + 'px';
    socialFloat.style.top = newY + 'px';

    socialFloat.style.right = 'auto';
    socialFloat.style.bottom = 'auto';
});

function stopDragging(event) {
    if (!dragging) {
        return;
    }

    dragging = false;

    socialFloat.classList.remove('dragging');

    socialToggle.releasePointerCapture?.(event.pointerId);

    const rect = socialFloat.getBoundingClientRect();

    const centerX =
        rect.left + rect.width / 2;

    if (centerX < window.innerWidth / 2) {
        socialFloat.style.left = '14px';
        socialFloat.style.right = 'auto';
    } else {
        socialFloat.style.left = 'auto';
        socialFloat.style.right = '14px';
    }

    socialFloat.style.top =
        Math.max(
            14,
            Math.min(
                rect.top,
                window.innerHeight -
                socialFloat.offsetHeight -
                14
            )
        ) + 'px';

    socialFloat.style.bottom = 'auto';

    setTimeout(function () {
        moved = false;
    }, 100);
}

socialToggle.addEventListener('pointerup', stopDragging);
socialToggle.addEventListener('pointercancel', stopDragging);

window.addEventListener('resize', function () {
    const rect =
        socialFloat.getBoundingClientRect();

    if (rect.right > window.innerWidth) {
        socialFloat.style.left = 'auto';
        socialFloat.style.right = '14px';
    }

    if (rect.bottom > window.innerHeight) {
        socialFloat.style.top =
            window.innerHeight -
            socialFloat.offsetHeight -
            14 + 'px';

        socialFloat.style.bottom = 'auto';
    }
});

const menuToggle = document.getElementById('menu-toggle');
const navbar = document.querySelector('.navbar');

if (menuToggle && navbar) {
    navbar.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menuToggle.checked = false;
        });
    });
}

const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.hero-dot');
let currentSlide = 0;

if (slides.length > 1) {
    setInterval(() => {
        slides[currentSlide].classList.remove('active');
        dots[currentSlide].classList.remove('active');

        currentSlide =
            (currentSlide + 1) % slides.length;

        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }, 5000);
}

const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');

function searchWebsite() {
    document.querySelectorAll('.search-highlight').forEach(highlight => {
        highlight.replaceWith(
            document.createTextNode(highlight.textContent)
        );
    });

    const keyword =
        searchInput.value.trim().toLowerCase();

    if (!keyword) {
        return;
    }

    const elements = document.querySelectorAll(
        'h1, h2, h3, p, .service-card, .why-card, .value-card, .collaboration-card'
    );

    let found = null;

    elements.forEach(element => {
        if (
            !found &&
            element.textContent
                .toLowerCase()
                .includes(keyword)
        ) {
            found = element;
        }
    });
if (found) {
    found.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });

    const walker = document.createTreeWalker(
        found,
        NodeFilter.SHOW_TEXT
    );

    let textNode;

    while (textNode = walker.nextNode()) {
        const text = textNode.nodeValue;
        const index = text.toLowerCase().indexOf(keyword);

        if (index !== -1) {
            const before = text.substring(0, index);
            const match = text.substring(
                index,
                index + keyword.length
            );
            const after = text.substring(
                index + keyword.length
            );

            const fragment = document.createDocumentFragment();

            if (before) {
                fragment.appendChild(
                    document.createTextNode(before)
                );
            }

            const highlight = document.createElement('span');
            highlight.className = 'search-highlight';
            highlight.textContent = match;

            fragment.appendChild(highlight);

            if (after) {
                fragment.appendChild(
                    document.createTextNode(after)
                );
            }

            textNode.parentNode.replaceChild(
                fragment,
                textNode
            );
        }
    }
} else {
    alert('Informasi yang dicari tidak ditemukan.');
}


}

if (searchButton && searchInput) {
    searchButton.addEventListener(
        'click',
        searchWebsite
    );

    searchInput.addEventListener(
        'keydown',
        function (event) {
            if (event.key === 'Enter') {
                searchWebsite();
            }
        }
    );
}

const serviceItems = document.querySelectorAll('.service-item');

serviceItems.forEach(item => {
    item.addEventListener('mouseenter', () => {
        serviceItems.forEach(service => {
            service.classList.remove('active');
        });

        item.classList.add('active');
    });
});

const searchBox = document.querySelector('.header-search');

if (searchButton && searchInput && searchBox) {
    searchButton.addEventListener('click', function (event) {
        event.stopPropagation();

        if (!searchBox.classList.contains('search-open')) {
            searchBox.classList.add('search-open');
            searchInput.focus();
        } else if (searchInput.value.trim() !== '') {
            searchWebsite();
        }
    });

    document.addEventListener('click', function (event) {
        if (
            !searchBox.contains(event.target) &&
            searchInput.value.trim() === ''
        ) {
            searchBox.classList.remove('search-open');
            searchInput.blur();
        }
    });

    window.addEventListener('scroll', function () {
        if (searchInput.value.trim() === '') {
            searchBox.classList.remove('search-open');
            searchInput.blur();
        }
    });
}

const promotionTrack = document.querySelector('.promotion-track');
const promotionCards = document.querySelectorAll('.promotion-card');
const promotionDotsContainer = document.querySelector('.promotion-dots');

let promotionIndex = 0;
let promotionTimer;

function getPromotionVisibleCards() {
    if (window.innerWidth <= 600) {
        return 1;
    }

    if (window.innerWidth <= 900) {
        return 2;
    }

    return 4;
}

function createPromotionDots() {
    if (!promotionDotsContainer || promotionCards.length === 0) {
        return;
    }

    promotionDotsContainer.innerHTML = '';

    const visibleCards = getPromotionVisibleCards();
    const maxIndex = Math.max(0, promotionCards.length - visibleCards);

    for (let i = 0; i <= maxIndex; i++) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'promotion-dot';

        if (i === promotionIndex) {
            dot.classList.add('active');
        }

        dot.addEventListener('click', function () {
            promotionIndex = i;
            updatePromotionSlider();
            restartPromotionSlider();
        });

        promotionDotsContainer.appendChild(dot);
    }
}

function updatePromotionSlider() {
    if (!promotionTrack || promotionCards.length === 0) {
        return;
    }

    const visibleCards = getPromotionVisibleCards();
    const gap = window.innerWidth <= 600 ? 14 : 20;
    const cardWidth = promotionCards[0].offsetWidth + gap;
    const maxIndex = Math.max(0, promotionCards.length - visibleCards);

    if (promotionIndex > maxIndex) {
        promotionIndex = 0;
    }

    promotionTrack.style.transform = `translateX(-${promotionIndex * cardWidth}px)`;

    const dots = document.querySelectorAll('.promotion-dot');

    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === promotionIndex);
    });
}

function nextPromotionSlide() {
    const visibleCards = getPromotionVisibleCards();
    const maxIndex = Math.max(0, promotionCards.length - visibleCards);

    if (maxIndex === 0) {
        return;
    }

    promotionIndex++;

    if (promotionIndex > maxIndex) {
        promotionIndex = 0;
    }

    updatePromotionSlider();
}

function restartPromotionSlider() {
    clearInterval(promotionTimer);

    promotionTimer = setInterval(function () {
        nextPromotionSlide();
    }, 3500);
}

if (promotionTrack && promotionCards.length > 1) {
    createPromotionDots();
    updatePromotionSlider();
    restartPromotionSlider();

    window.addEventListener('resize', function () {
        createPromotionDots();
        updatePromotionSlider();
    });
}

