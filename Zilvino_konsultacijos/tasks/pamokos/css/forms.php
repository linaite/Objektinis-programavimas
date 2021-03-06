.form{
  display: block;
  width: 400px;
  margin: 2rem auto;
  padding: 1rem;
  box-shadow: 0 4px 6px 2px #5555;
}

.form__title{
  text-align: center;
  font-size: 1.16rem;
  margin-bottom: 1rem;
}

.input-group{
  margin-bottom: 1rem;
}

.input-group>label{
  display: block;
  margin-bottom: 0.25rem;
}

.input-group>input[type=email],
.input-group>input[type=text],
.input-group>input[type=password],
.input-group>input[type=number]{
  width: 100%;
  border: none;
  border-bottom: 1px solid #339;
}

.input-group>input[type=email]:focus,
.input-group>input[type=text]:focus,
.input-group>input[type=password]:focus,
.input-group>input[type=number]:focus{
  outline: none;
  box-shadow: inset 0 -1px 0 0 #339;
}

.text--success{
  text-align: center;
  color: #393;
}

.text--error{
  text-align: center;
  color: #933;
}