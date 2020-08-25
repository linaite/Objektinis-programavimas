.grid-books{
  margin: 1rem 0 2rem
}

.grid-books__row{
  display: grid;
  grid-template-columns: 2fr 2fr 1fr 3fr;
}

.grid-books__row:nth-child(2n){
  background: #f9f9f9;
}

.grid-books__row--header{
  font-weight: 600;
  border-bottom: 1px solid #000;
}

.grid-books__col{
  padding: 0.5rem;
}