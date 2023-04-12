import {marked} from "marked";

export function parseMarkdown(element: Element) {
    let c = element.innerHTML.trim();
    let co = c.split('\n');
    for (let i = 0; i < co.length; i++) {
        co[i] = co[i].trim()
    }
    let content = marked.parse(co.join('\n'));
    element.classList.add('content')

    content = replaceTitles(content, element.classList.contains('preview'))

    element.innerHTML = content;
}

function replaceTitles(content: string, preview = false): string {
    if (preview) {
        return removeTitle(content)
    }
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
    return content;
}

function removeTitle(content: string): string {
    return content.replaceAll(/<h[1-6].*>.*<\/h[1-6]>/g, '');
}
