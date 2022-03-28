function showDiv() {
    document.getElementById("welcomeDiv").style.display = "block";
    document.getElementById("show").style.display = "none";
    document.getElementById("q").style.display = "none";
    document.getElementById("position").style.display = "none";
 }

const quizData = [
    {
        question: "Mikor született Eminem?",
        a: "1968. október 17.",
        b: "1970. október 17.",
        c: "1972. október 17.",
        d: "1974. október 17.",
        correct: "c",
    },
    {
        question: "Mi volt a születési neve?",
        a: "John",
        b: "Marshall",
        c: "Taylor",
        d: "Thomas",
        correct: "b",
    },
    {
        question: "Első albumának a címe?",
        a: "Infinite",
        b: "Recovery",
        c: "Kamikaze",
        d: "Encore",
        correct: "a",
    },
    {
        question: "Az album kiadása után min kellett keresztül mennie?",
        a: "Autóbaleset",
        b: "Önpusztítás",
        c: "Hatalmas siker",
        d: "Repülő katasztrófa",
        correct: "b",
    },
    {
        question: "Van felesége?",
        a: "Igen, kettő is",
        b: "Nem, nem szeretne",
        c: "Nem publikus adat",
        d: "Igen, készer házasodott vele",
        correct: "d",
    },
    {
        question: "Gyermekei?",
        a: "3 lány - 2 örökbefogadott",
        b: "3 fiú - 1 örökbefogadott",
        c: "1 fiú, 2 lány - saját",
        d: "Még nincs, de felesége várandós",
        correct: "a",
    },
    {
        question: "Hány stúdió albumot adott ki?",
        a: "16",
        b: "7",
        c: "18",
        d: "11",
        correct: "d",
    },
    {
        question: "Milyen műfajban tevékenykedik? (ajándék pont :))",
        a: "k-pop",
        b: "rock",
        c: "rap",
        d: "komoly zene",
        correct: "c",
    },
];
const quiz= document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')
let currentQuiz = 0
let score = 0
loadQuiz()
function loadQuiz() {
    deselectAnswers()
    const currentQuizData = quizData[currentQuiz]
    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}
function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}
function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}
submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if(answer) {
       if(answer === quizData[currentQuiz].correct) {
           score++
       }
       currentQuiz++
       if(currentQuiz < quizData.length) {
           loadQuiz()
       } else {
           quiz.innerHTML = `
           <h2>Helyes válaszok száma: ${score}/${quizData.length}</h2>
           <button onclick="location.reload()">Befejezés</button>
           `
       }
    }
})