import {marked} from "marked";

export function parseMarkdown(element: Element) {
    let content = marked.parse(element.innerHTML);
    element.classList.add('content')

    content = replaceTitles(content)

    element.innerHTML = content;
}

function replaceTitles(content: string): string {
    content = replaceTitle(content, 5);
    content = replaceTitle(content, 4);
    content = replaceTitle(content, 3);
    content = replaceTitle(content, 2);
    content = replaceTitle(content, 1);
    return content
}

function replaceTitle(content: string, level: number): string {
    while (content.indexOf(`<h${level} id`) != -1) {
        content = content.replace(`<h${level} id`, `<h${level+1} id`);
    }
    return content
}
