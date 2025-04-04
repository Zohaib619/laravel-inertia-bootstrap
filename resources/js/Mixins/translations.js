export const translations = {
    methods: {
        __(key, replacements = {}){
            let translation = window._translations[key] || key;
            Object.keys(replacements).forEach(r => {
                translation = translation.replace(`:${r}`, replacements[r])
            })
            return translation;
        },
    },
}