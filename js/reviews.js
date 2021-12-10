// add click event for hamburger menu 
const menu = document.querySelector('.menu');
const headContainer = document.querySelector('.head-container');

menu.addEventListener('click', () => {
  headContainer.classList.toggle('active-side');
})

let reviewsData = [];

function getReviews(){
  fetch('func/getReviews.php')
  .then(response => response.json())
  .then(datas => {
   displayReviews(datas);
   reviewsData = datas;
  })
}

function displayReviews(reviews){
  const reviewContent = document.querySelector('.reviews-content');
  let review = reviews.map(rev => {
    return `<li class="review">
				<span>${rev[4]}</span>
					<h2>${rev[1]}</h2>
					<h5>${rev[2]}</h5>
					<p>${rev[3]}</p>
			</li>`;
  }).join(' ');
  reviewContent.innerHTML = review;
}
getReviews();

// filter Categories by Rate
function onRate(num,e){
  const revButtons = document.querySelectorAll('.rev-button');
  for (let i = 0; i < revButtons.length; i++) {
    revButtons[i].classList.remove('active-rev');
  }
  e.classList.add('active-rev');
  const filteredRates = reviewsData.filter(dataRev => {
    return dataRev[5].includes(num);
  })
  displayReviews(filteredRates);
}

//send review form
let addReview = document.querySelector('.rev-submit');
let reviewFormData = document.querySelector('#review-form-data');

reviewFormData.addEventListener('submit', e => {
  e.preventDefault();
})

addReview.addEventListener('click', () => {
  let revMessage = document.querySelector('#review_mes').value;
  let fullname = document.querySelector('#name').value;
  
  if (revMessage == '' && fullname == '') {
    alert('please signin and fill up  a review');
  } else{
      let xhttp = new XMLHttpRequest();
      xhttp.onload = () => {
        if(xhttp.readyState === XMLHttpRequest.DONE ) {
          if(xhttp.status == 200) {
            revMessage.value = " ";
          }
        } else{
          alert('Failed');
        }
      }
      xhttp.open('POST', 'func/sendReviews.php', true);
      let newform = new FormData(reviewFormData);
      xhttp.send(newform);
      
       setInterval(function() {
        fetch(`func/getReviews.php`)
         .then(response => response.json())
         .then(datas => {
         displayReviews(datas);
         })
        }, 500);
      }
  
})