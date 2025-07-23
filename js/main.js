// Mobile menu toggle (se agregaría después)
document.addEventListener('DOMContentLoaded', function() {
    console.log('Landing page cargada');
    
    // Smooth scrolling para los enlaces
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if(targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if(targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Manejo del formulario de consultoría
document.getElementById("consultoria-form").addEventListener("submit", async function(e) {
    e.preventDefault();

    const data = {
        nombre: document.getElementById("nombre").value,
        empresa: document.getElementById("empresa").value,
        email: document.getElementById("email").value,
        telefono: document.getElementById("telefono").value,
        mensaje: document.getElementById("mensaje").value
    };

    const response = await fetch("http://localhost/api/guardar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();
    alert(result.mensaje || result.error);
});
// Añadir al JavaScript
window.addEventListener('scroll', function() {
    const section = document.querySelector('.sissa-section');
    const sectionPosition = section.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.3;
    
    if(sectionPosition < screenPosition) {
        document.querySelector('.sissa-content').classList.add('visible');
    }
});
// Animación para las tarjetas de servicio
document.addEventListener('DOMContentLoaded', function() {
    const servicioCards = document.querySelectorAll('.servicio-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    servicioCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `opacity 0.5s ${index * 0.1}s ease, transform 0.5s ${index * 0.1}s ease`;
        observer.observe(card);
    });
});
// Reemplaza el código de animación anterior con este:
function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.textContent = "+" + Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

document.addEventListener('DOMContentLoaded', function() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const numberElement = entry.target;
                const value = parseInt(numberElement.textContent.replace('+', ''));
                numberElement.textContent = "+0";
                animateValue(numberElement, 0, value, 2000);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    statNumbers.forEach(number => {
        observer.observe(number);
    });
});
// En tu archivo main.js
document.addEventListener('DOMContentLoaded', function() {
    const certCards = document.querySelectorAll('.certification-card');
    
    certCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.5s ${index * 0.2}s ease-out`;
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 500 + (index * 200));
    });
});
// En tu archivo main.js
document.addEventListener('DOMContentLoaded', function() {
    const membersSection = document.querySelector('.members-section');
    const membersElements = [
        ...membersSection.querySelectorAll('.section-title'),
        ...membersSection.querySelectorAll('.members-intro > *'),
        ...membersSection.querySelectorAll('.divider'),
        ...membersSection.querySelectorAll('.location-info > *')
    ];
    
    membersElements.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = `all 0.5s ${index * 0.15}s ease-out`;
        
        setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        }, 500 + (index * 150));
    });
});
// Animación para el CTA
document.querySelector('.final-cta').style.opacity = '0';
setTimeout(() => {
    document.querySelector('.final-cta').style.transition = 'opacity 1s ease';
    document.querySelector('.final-cta').style.opacity = '1';
}, 500);
