const formOne = document.getElementById('form-one');
const formTwo = document.getElementById('form-two');
const formPost = document.getElementById('form-post');
const formRequest = document.getElementById('form-request');
const formAssessments = document.getElementById('form-assessments');

const requestShow= document.getElementById('requests-show');

if (formOne) {
    formOne.addEventListener('submit', function(event) {
    event.preventDefault();

    function validateEmail(email) {
        const emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }
    
    const name = document.getElementsByName('name')[0].value;
    const username = document.getElementsByName('username')[0].value;
    const email = document.getElementsByName('email')[0].value;
    const birthdate = new Date(document.getElementsByName('birth')[0].value);
    const password = document.getElementsByName('password')[0].value;
    const confirmPassword = document.getElementById('passwordconfirm').value;
    
    const nameHasSpecialCharacters = /[!@#$%^&*(),.?":{}|<>]/.test(name);
    const usernameHasSpecialCharacters = /[^a-zA-Z0-9_]/.test(username);
    const emailIsValid = validateEmail(email);
    const birthdateIsValid = birthdate < new Date();
    const passwordLengthIsValid = password.length >= 8;
    const passwordsMatch = password === confirmPassword;
    
    if (nameHasSpecialCharacters) {
        document.getElementById('name-error').innerText = 'O nome não pode conter caracteres especiais.';
    } else {
        document.getElementById('name-error').innerText = '';
    }
    
    if (usernameHasSpecialCharacters) {
        document.getElementById('username-error').innerText = 'O username não pode conter certos caracteres especiais.';
    } else {
        document.getElementById('username-error').innerText = '';
    }
    
    if (!emailIsValid) {
        document.getElementById('email-error').innerText = 'O e-mail não é válido.';
    } else {
        document.getElementById('email-error').innerText = '';
    }
    
    if (!birthdateIsValid) {
        document.getElementById('birthdate-error').innerText = 'A data de nascimento não pode ser no futuro.';
    } else {
        document.getElementById('birthdate-error').innerText = '';
    }
    
    if (!passwordLengthIsValid) {
        document.getElementById('password-error').innerText = 'A senha deve ter no mínimo 8 caracteres.';
    } else {
        document.getElementById('password-error').innerText = '';
    }
    
    if (!passwordsMatch) {
        document.getElementById('passwordconfirm-error').innerText = 'As senhas não correspondem.';
    } else {
        document.getElementById('passwordconfirm-error').innerText = '';
    }

    if (!nameHasSpecialCharacters && !usernameHasSpecialCharacters && emailIsValid && birthdateIsValid && passwordLengthIsValid && passwordsMatch) {
        this.submit();
    } else {
        console.log('O formulário não atende aos critérios de validação.');
    }
});
}

if (formTwo) {
formTwo.addEventListener('submit', function(event) {
    event.preventDefault();

    const bio = document.getElementById('input-bio').value;
    const bioCaracteres = /["']/.test(bio);
    if (bioCaracteres) {
        document.getElementById('bio-error').innerText = 'A bio não pode conter aspas simples ou duplas.';
    } else {
        document.getElementById('bio-error').innerText = '';
    }

    // Se houver erros na bio ou nas imagens, não permita o envio do formulário
    if (bioCaracteres) {
        console.log('O formulário não atende aos critérios de validação.');
    } else {
        this.submit();
    }
});
}
function updateImagePreview(previewId, inputId) {
    const preview = document.getElementById(previewId);
    const input = document.getElementById(inputId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

const imageSelectors = document.querySelectorAll('.image-selector');

imageSelectors.forEach(selector => {
    const input = selector.querySelector('input[type="file"]');
    const image = selector.querySelector('img');

    image.addEventListener('click', () => {
        input.click();
    });
});

if (formPost) {
        formPost.addEventListener('submit', function(event) {
            const inputs = formPost.querySelectorAll('input, textarea');

            for (const input of inputs) {
                const value = input.value;

                if (value.includes('"') || value.includes("'")) {
                    // Mostrar a mensagem de erro no span associado ao input
                    const errorMessage = input.parentElement.querySelector('.error-message');
                    errorMessage.textContent = 'Os campos não podem conter aspas simples ou duplas.';
                    errorMessage.style.display = 'block';
                    event.preventDefault(); // Impede o envio do formulário
                    return; // Encerra a função
                }
            }
        });

    function updateExample(elementId, value) {
        document.getElementById(elementId).textContent = value;
    }

    function updateImagePreview(input) {
        const previewImage = document.getElementById('previewImage');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function updateTags(elementId, tags) {
        const tagsArray = tags.split('#').filter(tag => tag.trim() !== ''); 
        const exampleTags = document.getElementById(elementId);

        exampleTags.innerHTML = ''; 

        const tagsDiv = document.createElement('div'); // Criar uma div para as tags

        tagsArray.forEach(tag => {
            const tagSpan = document.createElement('span'); // Criar uma span para cada tag
            tagSpan.classList.add('art-style'); // Adicionar a classe 'art-style' à span
            tagSpan.textContent = tag.trim(); 
            tagsDiv.appendChild(tagSpan); // Adicionar a span à div
        });

        exampleTags.appendChild(tagsDiv); // Adicionar a div de tags ao elemento de exemplo
    }
}
if (formRequest) {
    function updateImagePreview(previewId, inputId) {
        const preview = document.getElementById(previewId);
        const input = document.getElementById(inputId);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    const imageSelectors = document.querySelectorAll('.image-selector');
    
    imageSelectors.forEach(selector => {
        const input = selector.querySelector('input[type="file"]');
        const image = selector.querySelector('img');
        
        image.addEventListener('click', () => {
            input.click();
        });
    });
    function validateDescription() {
    const description = document.getElementById('input-description').value;
    const descriptionError = document.getElementById('request-description');

    if (description.includes("'") || description.includes('"')) {
        descriptionError.textContent = 'A descrição não pode conter aspas simples ou duplas.';
        return false;
    }

    descriptionError.textContent = '';
    return true;
}

// Função para validar o título
function validateTitle() {
    const title = document.getElementById('input-title').value;
    const titleError = document.getElementById('request-title');

    if (title.includes("'") || title.includes('"')) {
        titleError.textContent = 'O título não pode conter aspas simples ou duplas.';
        return false;
    }

    titleError.textContent = '';
    return true;
}

// Função para validar o valor médio
function validateTotalValue() {
    const totalValue = parseFloat(document.getElementById('input-average-value').value);
    const totalValueError = document.getElementById('request-total-value');

    if (totalValue < 1) {
        totalValueError.textContent = 'O valor médio não pode ser menor que 1 real.';
        return false;
    }

    totalValueError.textContent = '';
    return true;
}

// Função para validar o prazo
function validateDeadline() {
    const today = new Date();
    const deadline = new Date(document.getElementById('input-deadline').value);
    const deadlineError = document.getElementById('request-deadline');

    if (deadline <= today) {
        deadlineError.textContent = 'A data de prazo deve ser no futuro.';
        return false;
    }

    deadlineError.textContent = '';
    return true;
}

// Função para validar o formulário antes do envio
function validateForm(event) {
    const isDescriptionValid = validateDescription();
    const isTitleValid = validateTitle();
    const isTotalValueValid = validateTotalValue();
    const isDeadlineValid = validateDeadline();

    if (!(isDescriptionValid && isTitleValid && isTotalValueValid && isDeadlineValid)) {
        event.preventDefault();  // Impede o envio do formulário se houver erros
    } else {
        // Pedir confirmação apenas se todas as validações passarem
        const confirmEnvio = confirm("Tem certeza de que deseja enviar o pedido?");

        if (!confirmEnvio) {
            event.preventDefault();  // Impede o envio do formulário
        }
    }
}
}  
if (formAssessments) {
    let selectedRating = 0;

    // Função para lidar com a seleção de estrelas
    function handleStarRating(rating) {
        selectedRating = rating;
        const stars = document.querySelectorAll('.form-avaliacao .form-rating .star');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
        
        document.getElementById('input-rating').value = rating;
    }

    formAssessments.addEventListener('submit', function(event) {
        const inputs = formAssessments.querySelectorAll('input, textarea');

        for (const input of inputs) {
            const value = input.value;

            if (value.includes('"') || value.includes("'")) {
                // Mostrar a mensagem de erro no span associado ao input
                const errorMessage = input.parentElement.querySelector('.error-message');
                errorMessage.textContent = 'Os campos não podem conter aspas simples ou duplas.';
                errorMessage.style.display = 'block';
                event.preventDefault(); // Impede o envio do formulário
                return; // Encerra a função
            }
        }
    });
}
if (requestShow) {
    function confirmed(request_id) {
        var overlay = document.getElementById('confirm-concluid-' + request_id);
        if (overlay.style.display === 'none' || overlay.style.display === '') {
            overlay.style.display = 'flex';
        } else {
            overlay.style.display = 'none';
        }
    }

    function toggleOverlay(requestId) {
        var overlay = document.getElementById('pedido-card-overlay-' + requestId);
        if (overlay.style.display === 'none' || overlay.style.display === '') {
            overlay.style.display = 'flex';
        } else {
            overlay.style.display = 'none';
        }
    }
    function resend(requestId) {
        var overlay = document.getElementById('form-resend-' + requestId);
        if (overlay.style.display === 'none' || overlay.style.display === '') {
            overlay.style.display = 'flex';
        } else {
            overlay.style.display = 'none';
        }
    }
    function resendShow(requestId) {
        var overlay = document.getElementById('resend-show-' + requestId);
        if (overlay) {
            if (overlay.style.display === 'none' || overlay.style.display === '') {
                overlay.style.display = 'flex';
            } else {
                overlay.style.display = 'none';
            }
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
const menuItems = document.querySelectorAll('ul.menu li.menu-item');

// Adiciona um event listener para cada item da lista
menuItems.forEach(item => {
item.addEventListener('click', () => {
    // Remove a classe "active" de todos os itens
 menuItems.forEach(item => item.classList.remove('active'));
 
 // Adiciona a classe "active" apenas ao item clicado
 item.classList.add('active');
});
});
});
function sanitizeInput(input) {
const sanitizedValue = input.value.replace(/[^\w\s]/gi, ''); // Remove caracteres especiais
input.value = sanitizedValue; // Atualiza o valor do input
}
}