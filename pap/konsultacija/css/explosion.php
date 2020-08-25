.container {
  width: 960px;
  margin: auto
}

.bomb-container{
  display: flex;
  margin-top: 150px;
  justify-content: space-between;
  align-items: center;
}

.time {
  line-height: 400px;
  text-align: center;
  font-size: 1.5rem;
  width: 100%;
}

.img {
  background-image: url(<?= IMG_URL; ?>bomb.png);
  height: 450px;
  width: 400px;
  background-size: cover;
  background-position: center;
  width: 100%;
}

.img-00 {
  background-image: url(<?= IMG_URL; ?>explosion.jpg);
}