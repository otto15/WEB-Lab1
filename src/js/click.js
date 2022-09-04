function btnClick(targetId, val, id) {
    let el = document.getElementById(id);
    let parent = el.parentElement;
    for (const child of parent.children) {
        if (child.classList.contains("selected")) {
            child.classList.remove("selected");
            if (child === el) {
                document.getElementById(targetId).value = "";
                return;
            }
        }
    }
    document.getElementById(targetId).value = val;
    el.classList.add("selected");
}