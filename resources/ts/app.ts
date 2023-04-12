import './bootstrap';
import '../scss/main.scss'
import {parseMarkdown} from "./src/parser";

const toParse = document.querySelectorAll('.md-parse');

toParse.forEach(item => {
    parseMarkdown(item)
})

document.querySelectorAll('.is-disabled').forEach(item => {
    item.addEventListener('keydown', e => e.preventDefault());
});
