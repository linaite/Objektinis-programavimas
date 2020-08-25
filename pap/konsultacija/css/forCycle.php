.beer-container{
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
}

.beer-container__info{
  text-align: center;
}

.beer{
  height: 90px;
  width: 40px;
  background-position: center;
  background-size: cover;
  background-image: url(<?= IMG_URL; ?>beer.jpg);
}

.beer.beer--empty{
  background-image: url(<?= IMG_URL; ?>empty_beer.jpg);
}

.beer-container>*:not(:first-of-type){
  margin-left: 1rem;
}
