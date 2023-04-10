import './bootstrap';
import '../scss/main.scss'
import {marked} from "marked";
import {parseMarkdown} from "./src/parser";

const toParse = document.querySelectorAll('.md-parse');

toParse.forEach(item => {
    parseMarkdown(item)
})
