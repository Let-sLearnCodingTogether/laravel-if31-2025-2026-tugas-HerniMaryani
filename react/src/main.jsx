import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import "./assets/css/styles.css";
import BookPage from './pages/book/Book';


createRoot(document.getElementById('root')).render(
  <StrictMode>
    <BookPage />
  </StrictMode>,
)
